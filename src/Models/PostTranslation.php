<?php

namespace Juzaweb\Modules\Blog\Models;

use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;

class PostTranslation extends Model
{
    use HasAPI;

    protected $table = 'post_translations';

    protected $fillable = [];
}
