<?php

namespace Juzaweb\Modules\Blog\Models;

use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;
use Juzaweb\Core\Traits\HasSlug;

class PostTranslation extends Model
{
    use HasAPI, HasSlug;

    protected $table = 'post_translations';

    protected $fillable = [
        'title',
        'content',
        'slug',
        'locale',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
