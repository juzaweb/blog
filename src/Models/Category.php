<?php

namespace Juzaweb\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;
use Juzaweb\Core\Traits\Translatable;
use Juzaweb\Translations\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract
{
    use HasAPI, HasUuids, Translatable;

    protected $table = 'post_categories';

    protected $translationForeignKey = 'post_category_id';

    protected $fillable = [
        'parent_id',
    ];

    public $translatedAttributes = [
        'name',
        'description',
        'slug',
        'thumbnail',
    ];
}
