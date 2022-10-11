<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidProduct;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $brands = Partner::latest()->get();
        return view('admin.products.add-product', compact('categories', 'brands'));
    }

    public function getSubCat($category_id)
    {
        $subcategories = SubCategory::where('category_id', '=', $category_id)
            ->orderBy('id', 'ASC')->get();

        return json_encode($subcategories);
    }

    public function getSubSub($subcategory_id)
    {
        $subSubCat = SubSubCategory::where('subcategory_id', '=', $subcategory_id)
            ->orderBy('id', 'ASC')->get();

        return json_encode($subSubCat);
    }

    public function storeProduct(ValidProduct $request)
    {
        // product image upload
        $prodThumb = $request->file('product_thumbnail');
        $thumbName = hexdec(uniqid()) . '.' . $prodThumb->getClientOriginalExtension();

        Image::make($prodThumb)->resize(917, 1000)->save('uploads/products/product-thumbnails/' . $thumbName);

        $saveUrl = 'uploads/products/product-thumbnails/' . $thumbName;

        $productId = Product::insertGetId([
            'partner_id' => $request->partner_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'product_thumbnail' => $saveUrl,
            'product_overview_en' => $request->product_overview_en,
            'product_overview_ar' => $request->product_overview_ar,
            'product_description_en' => $request->product_description_en,
            'product_description_ar' => $request->product_description_ar,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        // Product Multiple image upload
        $multiImgs = $request->file('multi_img');
        if (!file_exists(public_path('uploads/products/product-multi-imgs/' . $request->product_name_en)))
        {
            mkdir(public_path('uploads/products/product-multi-imgs/' . $request->product_name_en), 0700);
        }
        foreach ($multiImgs as $img)
        {
            $imgUniqueName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)
                ->save('uploads/products/product-multi-imgs/' . $request->product_name_en . '/' . $imgUniqueName);
            $imgPath = 'uploads/products/product-multi-imgs/' . $request->product_name_en . '/' . $imgUniqueName;
            ProductImg::insert([
                'product_id' => $productId,
                'img_name' => $imgPath,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->route('admin.manage-products')
            ->with('success', 'Product Inserted Successfully');
    }

    // method to display all products in the database
    public function viewProducts()
    {
        $products = Product::orderBy('id', 'DESC')->get();

        return view('admin.products.view-products', compact('products'));
    }

    public function edit($id)
    {
        $brands = Partner::latest()->get();
        $categories = Category::latest()->get();
        $product = Product::find($id);

        $subCategories = SubCategory::where('category_id', '=', $product->category_id)
            ->get();

        $subSubCategories = SubSubCategory::where('subcategory_id', '=', $product->subcategory_id)
            ->get();

        return view('admin.products.edit', compact('brands', 'categories', 'subCategories', 'subSubCategories', 'product'));

    }

}
