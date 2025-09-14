<?php

namespace Juzaweb\Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Juzaweb\Core\Facades\Breadcrumb;
use Juzaweb\Core\Http\Controllers\AdminController;
use Juzaweb\Modules\Blog\Http\DataTables\CategoriesDataTable;
use Juzaweb\Modules\Blog\Models\Category;

class CategoryController extends AdminController
{
    public function index(CategoriesDataTable $dataTable)
    {
        Breadcrumb::add(__('Categories'));

        return $dataTable->render('blog::category.index');
    }

    public function create()
    {
        Breadcrumb::add(__('Categories'), action([self::class, 'index']));

        Breadcrumb::add(__('Create new Category'));

        return view(
            'blog::category.form',
            [
                'model' => new Category(),
                'action' => action([self::class, 'store']),
            ]
        );
    }

    public function edit(string $id)
    {
        return view('blog::category.form');
    }
}
