<?php

namespace Juzaweb\Blog\Models;

use Juzaweb\Core\Traits\UseSlug;
use Juzaweb\Core\Traits\UseThumbnail;
use Illuminate\Database\Eloquent\Model;

/**
 * Juzaweb\Blog\Models\Page
 *
 * @property int $id
 * @property string $name
 * @property string|null $thumbnail
 * @property string $slug
 * @property string|null $content
 * @property string $status
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereViews($value)
 * @mixin \Eloquent
 */
class Page extends Model
{
    use UseThumbnail, UseSlug;
    
    protected $table = 'pages';
    protected $fillable = [
        'name',
        'content',
        'status',
        'thumbnail'
    ];
}
