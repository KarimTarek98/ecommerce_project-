<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.subcategories.index', [
            'subcategories' => SubCategory::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.subcategories.create', [
            'categories' => Category::orderBy('category_name_en', 'ASC')->get()
        ]);
    }

    public function store(StoreSubCategoryRequest $request)
    {
        SubCategory::create([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),
            'category_id' => $request->category_id
        ]);

        return redirect('admin/sub_categories')
            ->with('success', 'Subcategory Added Successfully');
    }

    public function edit($subcategory)
    {
        return view('admin.subcategories.edit', [
            'subcategory' => SubCategory::slug($subcategory)->first(),
            'categories' => Category::orderBy('category_name_en', 'ASC')->get()
        ]);
    }

    public function update(StoreSubCategoryRequest $request, $subcategory)
    {
        SubCategory::slug($subcategory)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),
            'category_id' => $request->category_id
        ]);

        return redirect('admin/sub_categories')
            ->with('info', 'Subcategory Updated');
    }

    public function destroy($subcategory)
    {

        SubCategory::slug($subcategory)->delete();

        return redirect('admin/sub_categories')
            ->with('error', 'Subcategory Deleted !');
    }
}
