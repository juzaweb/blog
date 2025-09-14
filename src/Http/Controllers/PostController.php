<?php

namespace Juzaweb\Modules\Blog\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Juzaweb\Core\Facades\Breadcrumb;
use Juzaweb\Core\Http\Controllers\AdminController;
use Juzaweb\Modules\Blog\Http\DataTables\PostsDataTable;
use Juzaweb\Modules\Blog\Http\Requests\PostRequest;
use Juzaweb\Modules\Blog\Models\Category;
use Juzaweb\Modules\Blog\Models\Post;

class PostController extends AdminController
{
    public function index(PostsDataTable $dataTable)
    {
        Breadcrumb::add(__('Blog'));

        return $dataTable->render(
            'blog::post.index'
        );
    }

    public function create()
    {
        Breadcrumb::add(__('Blog'), action([self::class, 'index']));

        Breadcrumb::add(__('Create New Post'));

        $locale = $this->getFormLanguage();
        $categories = Category::withTranslation()->get();

        return view(
            'blog::post.form',
            [
                'model' => new Post(),
                'action' => action([self::class, 'store']),
                'locale' => $locale,
                'categories' => $categories,
            ]
        );
    }

    public function edit(string $id)
    {
        $model = Post::findOrFail($id);

        Breadcrumb::add(__('Blog'), action([self::class, 'index']));

        Breadcrumb::add(__('Edit Post: :name', ['name' => $model->title]));

        $locale = $this->getFormLanguage();
        $categories = Category::withTranslation()->get();

        return view(
            'blog::post.form',
            [
                'model' => $model,
                'action' => action([self::class, 'update'], [$id]),
                'locale' => $locale,
                'categories' => $categories,
            ]
        );
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();

        DB::transaction(
            function () use ($data) {
                $post = Post::create($data);
                if (isset($data['categories'])) {
                    $post->categories()->sync($data['categories']);
                }

                return $post;
            }
        );

        return $this->success(
            [
                'message' => __('Post created successfully.'),
                'redirect' => action([self::class, 'index']),
            ]
        );
    }

    public function update(PostRequest $request, string $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);

        DB::transaction(
            function () use ($post, $data) {
                $post->update($data);
                $post->categories()->sync($data['categories'] ?? []);
                return $post;
            }
        );

        return $this->success(
            [
                'message' => __('Post updated successfully.'),
                'redirect' => action([self::class, 'index']),
            ]
        );
    }
}
