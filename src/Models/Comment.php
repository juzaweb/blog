<?php

namespace Juzaweb\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Juzaweb\Core\Models\User;
use Juzaweb\Core\Support\PostType;

/**
 * Juzaweb\Blog\Models\Comment
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $email
 * @property string|null $name
 * @property string|null $website
 * @property string $content
 * @property int $object_id Post type ID
 * @property string $object_type Post type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereObjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereWebsite($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'email',
        'name',
        'website',
        'content',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /*public function postType()
    {
        $postType = PostType::getPostTypes($this->object_type);
        return $this->belongsTo($postType->get('model'), 'object_id', 'id')->where('object_type', '=', $this->object_type);
    }*/

    public function whereActive($builder)
    {
        return $builder->where('status', '=', 'approved');
    }
}
