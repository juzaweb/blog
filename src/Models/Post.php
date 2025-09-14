<?php

namespace Juzaweb\Modules\Blog\Models;

use Juzaweb\Core\Models\Model;
use Juzaweb\Core\Traits\HasAPI;

class Post extends Model
{
    use HasAPI;

    protected $table = 'posts';

    protected $fillable = [];
}
