<?php

namespace Juzaweb\Blog\Http\Controllers;

use Juzaweb\Theme\Http\Controllers\FrontendController;

class PostController extends FrontendController
{
    public function index()
    {
        return view('pages.post.index');
    }
    
    public function detail($slug)
    {
        return view('pages.post.detail');
    }
}
