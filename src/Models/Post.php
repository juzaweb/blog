<?php

namespace Juzaweb\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;
use Juzaweb\Core\Traits\Translatable;
use Juzaweb\Translations\Contracts\Translatable as TranslatableContract;

class Post extends Model implements TranslatableContract
{
    use HasAPI, HasUuids, Translatable;

    protected $table = 'posts';

    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public $translatedAttributes = [
        'title',
        'content',
        'slug',
        'locale',
    ];
}
