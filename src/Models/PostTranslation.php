<?php

namespace Juzaweb\Modules\Blog\Models;

use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;
use Juzaweb\Core\Traits\HasSeoMeta;
use Juzaweb\Core\Traits\HasSlug;
use Juzaweb\FileManager\Traits\HasMedia;

class PostTranslation extends Model
{
    use HasAPI, HasSlug, HasSeoMeta, HasMedia;

    protected $table = 'post_translations';

    protected $fillable = [
        'title',
        'content',
        'slug',
        'locale',
    ];

    protected $appends = [
        'thumbnail',
    ];

    public $mediaChannels = ['thumbnail'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function getThumbnailAttribute(): ?string
    {
        return $this->getFirstMediaUrl('thumbnail');
    }

    public function seoMetaFill(): array
    {
        return [
            'title' => $this->title,
            'description' => seo_string(strip_tags($this->content), 160),
        ];
    }
}
