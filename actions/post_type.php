<?php

use Juzaweb\Core\Facades\HookAction;

HookAction::registerPostType('posts', [
    'label' => trans('juzaweb::app.posts'),
    'model' => \Juzaweb\Blog\Models\Post::class,
    'menu_icon' => 'fa fa-edit',
    'menu_position' => 15,
    'supports' => ['category', 'tag'],
]);

HookAction::registerPostType('pages', [
    'label' => trans('juzaweb::app.pages'),
    'model' => \Juzaweb\Blog\Models\Page::class,
    'menu_icon' => 'fa fa-edit',
    'menu_position' => 15,
    'supports' => [],
]);

HookAction::addAdminMenu(
    trans('juzaweb::app.comments'),
    'comments',
    [
        'icon' => 'fa fa-comments',
        'position' => 30
    ]
);
