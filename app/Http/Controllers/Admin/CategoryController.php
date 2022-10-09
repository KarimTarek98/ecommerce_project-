<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $categories = Category::select('*')->orderBy('id', 'DESC')->get();

        return view('admin.categories.all', compact('categories'));
    }

    public function addCategory()
    {
        return view('admin.categories.add');
    }

    public function storeCategory(ValidCategory $request)
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

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(ValidCategory $request)
    {
        $catId = $request->category_id;

        $catToUpdate = Category::findOrFail($catId);

        $catToUpdate->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ', '-', $request->category_name_ar),
            'category_icon' => $request->category_icon
        ]);

        return redirect()->route('admin.all-categories')
            ->with('info', 'Category Updated');
    }

    public function deleteCategory($id)
    {
        $catToDelete = Category::findOrFail($id);

        $catToDelete->delete();

        return redirect()->route('admin.all-categories')
            ->with('error', 'Category Deleted !');
    }
}
