<?php

namespace Juzaweb\Modules\Blog\Models;

use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;

class CategoryTranslation extends Model
{
    use HasAPI;

    protected $table = 'category_translations';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'locale',
        'category_id',
    ];
}
