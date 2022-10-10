<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubSubCategoryController extends Controller
{
    public function all()
    {
        $subsubcategories = SubSubCategory::latest()->get();

        return view('admin.sub-subcategories.all', compact('subsubcategories'));
    }

    public function add()
    {
        $categories = Category::latest()->get();
        return view('admin.sub-subcategories.add', compact('categories'));
    }

    public function getSubcategories($category_id)
    {
        $subcategories = SubCategory::where('category_id', '=', $category_id)
            ->orderBy('id', 'ASC')->get();

        return json_encode($subcategories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_sub_category_name_en' => 'required|string|max:30',
            'sub_sub_category_name_ar' => 'required|string|max:50',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
        ]);

        SubSubCategory::create([
            'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
            'sub_sub_category_name_ar' => $request->sub_sub_category_name_ar,
            'sub_sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_sub_category_name_en)),
            'sub_sub_category_slug_ar' => str_replace(' ', '-', $request->sub_sub_category_name_ar),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);

        return redirect()->route('admin.sub-subcategories')
            ->with('success', 'Sub-subcategory Added');
    }

    public function edit($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);


        $categories = Category::latest()->get();
        $subcategories = DB::table('sub_categories')->where('category_id', '=', $subsubcategory->category_id)->get();
        //return $subcategories;

        return view('admin.sub-subcategories.edit', compact('subsubcategory', 'categories', 'subcategories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sub_sub_category_name_en' => 'required|string|max:30',
            'sub_sub_category_name_ar' => 'required|string|max:50',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
        ]);

        $subSubId = $request->subsub_id;

        $subSubToUpdate = SubSubCategory::findOrFail($subSubId);

        $subSubToUpdate->update([
            'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
            'sub_sub_category_name_ar' => $request->sub_sub_category_name_ar,
            'sub_sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_sub_category_name_en)),
            'sub_sub_category_slug_ar' => str_replace(' ', '-', $request->sub_sub_category_name_ar),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);


        return redirect()->route('admin.sub-subcategories')
            ->with('info', 'Sub-Sub Category Updated');
    }

    public function delete($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        return redirect()->route('admin.sub-subcategories')
            ->with('error', 'Sub-Sub Category Deleted !');
    }
}
