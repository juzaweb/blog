<?php

namespace Juzaweb\Modules\Blog\Models;

use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;
use Juzaweb\Core\Traits\HasSeoMeta;
use Juzaweb\Core\Traits\HasSlug;

class CategoryTranslation extends Model
{
    use HasAPI, HasSlug, HasSeoMeta;

    protected $table = 'post_category_translations';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'locale',
        'post_category_id',
    ];

    public function seoMetaFill(): array
    {
        return [
            'title' => $this->name,
            'description' => $this->description,
        ];
    }
}
