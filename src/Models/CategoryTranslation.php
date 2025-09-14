<?php

namespace Juzaweb\Modules\Blog\Models;

use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;
use Juzaweb\Core\Traits\HasSeoMeta;
use Juzaweb\Core\Traits\HasSlug;
use Juzaweb\FileManager\Traits\HasMedia;

class CategoryTranslation extends Model
{
    use HasAPI, HasSlug, HasSeoMeta, HasMedia;

    protected $table = 'post_category_translations';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'locale',
        'post_category_id',
    ];
    
    protected $appends = [
        'thumbnail',
    ];
    
    public $mediaChannels = ['thumbnail'];

    public function getThumbnailAttribute(): ?string
    {
        return $this->getFirstMediaUrl('thumbnail');
    }

    public function seoMetaFill(): array
    {
        return [
            'title' => $this->name,
            'description' => $this->description,
        ];
    }
}
