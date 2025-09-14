<?php
/**
 * JUZAWEB CMS - Laravel CMS for Your Project
 *
 * @package    juzaweb/cms
 * @author     The Anh Dang
 * @link       https://cms.juzaweb.com
 */

namespace Juzaweb\Modules\Blog\Http\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Juzaweb\Core\DataTables\Action;
use Juzaweb\Core\DataTables\BulkAction;
use Juzaweb\Core\DataTables\Column;
use Juzaweb\Core\DataTables\DataTable;
use Juzaweb\Modules\Blog\Models\Post;

class PostsDataTable extends DataTable
{
    protected string $actionUrl = 'posts/bulk';

    public function query(Post $model): QueryBuilder
    {
        return $model->newQuery()->filter(request()->all());
    }

    public function getColumns(): array
    {
        return [
            Column::checkbox(),
            Column::id(),
            Column::editLink('title', admin_url('posts/{id}/edit'), __('Title')),
            Column::createdAt(),
            Column::actions(),
        ];
    }

    public function bulkActions(): array
    {
        return [
            BulkAction::delete()->can('posts.delete'),
        ];
    }

    public function actions(Model $model): array
    {
        return [
            Action::edit(admin_url("posts/{$model->id}/edit"))
                ->can('posts.edit'),
            Action::delete()
                ->can('posts.delete'),
        ];
    }
}
