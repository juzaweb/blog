<?php

namespace Juzaweb\Blog\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Juzaweb\Core\Http\Controllers\BackendController;
use Juzaweb\Core\PostType;
use Juzaweb\Blog\Models\Post;

class PostController extends BackendController
{
    protected $setting;
    protected $postType = 'posts';

    public function __construct()
    {
        $this->setting = PostType::getPostTypes($this->postType);
        if (empty($this->setting)) {
            throw new \Exception(
                'Post type ' . $this->postType . ' does not exists.'
            );
        }
    }

    public function index()
    {
        return view('jw_blog::post.index', [
            'title' => $this->setting->get('label')
        ]);
    }

    public function create()
    {
        $this->addBreadcrumb([
            'title' => $this->setting->get('label'),
            'url' => route("admin.posts.index"),
        ]);

        $model = new Post();
        return view('jw_blog::post.form', [
            'title' => trans('juzaweb::app.add_new'),
            'model' => $model,
            'postType' => $this->postType
        ]);
    }

    public function edit($id)
    {
        $this->addBreadcrumb([
            'title' => $this->setting->get('label'),
            'url' => route("admin.posts.index"),
        ]);

        $model = Post::findOrFail($id);

        return view('jw_blog::post.form', [
            'title' => $model->title,
            'model' => $model,
            'postType' => $this->postType
        ]);
    }

    public function getDataTable(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'desc');
        $offset = $request->get('offset', 0);
        $limit = $request->get('limit', 20);
        
        $query = Post::query();
        
        if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->orWhere('name', 'like', '%'. $search .'%');
                $q->orWhere('description', 'like', '%'. $search .'%');
            });
        }
        
        if ($status) {
            $query->where('status', '=', $status);
        }
        
        $count = $query->count();
        $query->orderBy($sort, $order);
        $query->offset($offset);
        $query->limit($limit);
        $rows = $query->get();
        
        foreach ($rows as $row) {
            $row->thumb_url = $row->getThumbnail();
            $row->created = $row->created_at->format('H:i Y-m-d');
            $row->edit_url = route('admin.posts.edit', [$row->id]);
        }
        
        return response()->json([
            'total' => $count,
            'rows' => $rows
        ]);
    }
    
    public function store(Request $request)
    {
        Post::create($request->all());
        
        return $this->success([
            'message' => trans('juzaweb::app.saved_successfully'),
            'redirect' => route('admin.posts.index')
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = Post::findOrFail($id);

        $model->update($request->all());

        return $this->success([
            'message' => trans('juzaweb::app.saved_successfully')
        ]);
    }
    
    public function bulkActions(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'action' => 'required',
        ]);

        $action = $request->post('action');
        $ids = $request->post('ids');

        switch ($action) {
            case 'delete':
                Post::whereIn('id', $ids)
                    ->delete();
                break;
            case 'public':
            case 'private':
            case 'draft':
                Post::whereIn('id', $ids)
                    ->update([
                        'status' => $action
                    ]);
                break;
        }

        return $this->success([
            'message' => trans('juzaweb::app.successfully')
        ]);
    }
}
