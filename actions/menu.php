<?php

use Juzaweb\Blog\Models\Post;
use Juzaweb\Core\Facades\HookAction;

HookAction::registerPostType('posts', [
    'label' => trans('juzaweb::app.posts'),
    'model' => Post::class,
    'menu_icon' => 'fa fa-edit',
    'menu_position' => 15,
    'rewrite' => false,
    'supports' => [
        'category',
        'tag',
        'comment'
    ],
]);


