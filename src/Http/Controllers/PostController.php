<?php

namespace Juzaweb\Modules\Blog\Http\Controllers;

use Juzaweb\Core\Facades\Breadcrumb;
use Juzaweb\Core\Http\Controllers\AdminController;
use Juzaweb\Modules\Blog\Http\DataTables\PostsDataTable;

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

        return view('blog::post.index');
    }

    public function edit(string $id)
    {
        Breadcrumb::add(__('Blog'), action([self::class, 'index']));

        Breadcrumb::add(__('Edit Post: :name', ['name' => $id]));

        return view('blog::post.index');
    }
}
