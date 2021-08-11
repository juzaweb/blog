<?php

namespace Juzaweb\Blog\Models;

use Juzaweb\Core\Traits\UseSlug;
use Juzaweb\Core\Traits\UseThumbnail;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use UseThumbnail, UseSlug;
    
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'status',
        'views',
        'thumbnail'
    ];
    
    public function comments()
    {
        return $this->hasMany('Juzaweb\Core\PostType\Models\Comment', 'post_id', 'id');
    }

    public function taxonomies()
    {
        return $this->belongsToMany('Juzaweb\Core\PostType\Models\Taxonomy', 'term_taxonomies', 'term_id', 'taxonomy_id')
            ->withPivot(['term_type'])
            ->wherePivot('term_type', '=', 'posts');
    }
}
