<?php

namespace Juzaweb\Modules\Blog\Http\Controllers;

use Juzaweb\Modules\Blog\Models\Post;
use Juzaweb\Modules\Core\Http\Controllers\Admin\CommentController as CoreCommentController;

class CommentController extends CoreCommentController
{
    protected string $commentableType = Post::class;
}
