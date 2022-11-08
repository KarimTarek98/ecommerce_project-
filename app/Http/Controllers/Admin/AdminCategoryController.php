<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ', '-', $request->category_name_ar,),
            'category_icon' => $request->category_icon
        ]);

        return redirect()->route('admin.all-categories')
            ->with('success', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {

        $category->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ', '-', $request->category_name_ar),
            'category_icon' => $request->category_icon
        ]);

        return redirect('admin/categories')
            ->with('info', 'Category Updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.all-categories')
            ->with('error', 'Category Deleted !');
    }
}
