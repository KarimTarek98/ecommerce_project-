<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function all()
    {
        $subcategories = SubCategory::orderBy('id', 'DESC')->get();

        return view('admin.subcategories.all', compact('subcategories'));
    }

    public function add()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('admin.subcategories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required|string|max:30',
            'subcategory_name_ar' => 'required|string|max:30',
            'category_id' => 'required|integer'
        ], [
            'subcategory_name_en.required' => 'Please insert Subcategory name in English',
            'subcategory_name_ar.required' => 'Please insert Subcategory name in Arabic',
        ]);

        SubCategory::create([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.subcategories')
            ->with('success', 'Subcategory Added Successfully');
    }

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required|string|max:30',
            'subcategory_name_ar' => 'required|string|max:30',
            'category_id' => 'required|integer'
        ], [
            'subcategory_name_en.required' => 'Please insert Subcategory name in English',
            'subcategory_name_ar.required' => 'Please insert Subcategory name in Arabic',
        ]);

        $subId = $request->subcategory_id;
        $subToUpdate = SubCategory::findOrFail($subId);

        $subToUpdate->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.subcategories')
            ->with('info', 'Subcategory Updated');
    }

    public function delete($id)
    {
        $subToDelete = SubCategory::findOrFail($id);
        $subToDelete->delete();

        return redirect()->route('admin.subcategories')
            ->with('error', 'Subcategory Deleted !');
    }
}
