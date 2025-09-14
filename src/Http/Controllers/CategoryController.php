<?php

namespace Juzaweb\Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Juzaweb\Core\Facades\Breadcrumb;
use Juzaweb\Core\Http\Controllers\AdminController;
use Juzaweb\Modules\Blog\Http\DataTables\CategoriesDataTable;
use Juzaweb\Modules\Blog\Http\Requests\CategoryRequest;
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

        $parentCategories = Category::withTranslationAndMedia()->get();
        $locale = $this->getFormLanguage();

        return view(
            'blog::category.form',
            [
                'model' => new Category(),
                'action' => action([self::class, 'store']),
                'parentCategories' => $parentCategories,
                'locale' => $locale,
            ]
        );
    }

    public function edit(string $id)
    {
        $model = Category::findOrFail($id);

        Breadcrumb::add(__('Categories'), action([self::class, 'index']));

        Breadcrumb::add(__('Edit Category :name', ['name' => $model->name]));

        $parentCategories = Category::withTranslationAndMedia()
            ->where('id', '!=', $id)
            ->get();
        $locale = $this->getFormLanguage();

        return view(
            'blog::category.form',
            [
                'model' => $model,
                'action' => action([self::class, 'update'], ['id' => $id]),
                'parentCategories' => $parentCategories,
                'locale' => $locale,
            ]
        );
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = DB::transaction(fn () => Category::create($data));

        return $this->success(
            [
                'message' => __('Category created successfully.'),
                'redirect' => action([self::class, 'index']),
            ]
        );
    }

    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);

        DB::transaction(fn () => $category->update($data));

        return $this->success(
            [
                'message' => __('Category updated successfully.'),
                'redirect' => action([self::class, 'index']),
            ]
        );
    }

    public function bulk(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids', []);

        if ($action == 'delete') {
            Category::whereIn('id', $ids)
                ->get()
                ->each
                ->delete();
        }

        return $this->success(
            [
                'message' => __('Category updated successfully.'),
            ]
        );
    }
}
