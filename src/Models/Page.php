<?php

namespace Juzaweb\Blog\Models;

use Juzaweb\Core\Traits\UseSlug;
use Juzaweb\Core\Traits\UseThumbnail;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use UseThumbnail, UseSlug;
    
    protected $table = 'pages';
    protected $fillable = [
        'name',
        'content',
        'status',
        'thumbnail'
    ];
}
