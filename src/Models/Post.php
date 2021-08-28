<?php

namespace Juzaweb\Blog\Models;

use Juzaweb\Core\Traits\PostTypeModel;
use Illuminate\Database\Eloquent\Model;

/**
 * Juzaweb\Blog\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string|null $thumbnail
 * @property string $slug
 * @property string|null $content
 * @property string $status
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViews($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Juzaweb\Blog\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Juzaweb\Core\Models\Taxonomy[] $taxonomies
 * @property-read int|null $taxonomies_count
 */
class Post extends Model
{
    use PostTypeModel;
    
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
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function taxonomies()
    {
        return $this->belongsToMany('Juzaweb\Core\Models\Taxonomy', 'term_taxonomies', 'term_id', 'taxonomy_id')
            ->withPivot(['term_type'])
            ->wherePivot('term_type', '=', 'posts');
    }
}
