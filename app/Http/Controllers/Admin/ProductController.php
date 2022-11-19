<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
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
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::latest()->get(),
            'brands' => Partner::latest()->get()
        ]);
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

    public function store(StoreProductRequest $request)
    {
        // product image upload
        $prodThumb = $request->file('product_thumbnail');
        $thumbName = hexdec(uniqid()) . '.' . $prodThumb->getClientOriginalExtension();

        Image::make($prodThumb)->resize(917, 1000)->save('uploads/products/product-thumbnails/' . $thumbName);

        $saveUrl = 'uploads/products/product-thumbnails/' . $thumbName;

        $product = Product::create([
            'partner_id' => $request->partner_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => $request->product_name_en,
            'product_slug_ar' => $request->product_name_ar,
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
                'product_id' => $product->id,
                'img_name' => $imgPath,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->route('admin.manage-products')
            ->with('success', 'Product Inserted Successfully');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'brands' => Partner::latest()->get(),
            'categories' => Category::latest()->get(),
            'productImgs' => ProductImg::where('product_id', '=', $product->id)->get(),
            'subCategories' => SubCategory::where('category_id', '=', $product->category_id)->get(),
            'subSubCategories' => SubSubCategory::where('subcategory_id', '=', $product->subcategory_id)
            ->get()
        ]);

    }

    // update product method
    public function update(StoreProductRequest $request, Product $product)
    {
        //$productId = $request->product_id;

        //$productToUpdate = Product::findOrFail($productId);
        rename(public_path('uploads/products/product-multi-imgs/'. $product->product_name_en), public_path('uploads/products/product-multi-imgs/'. $request->product_name_en));

        $product->update([
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
            'product_overview_en' => $request->product_overview_en,
            'product_overview_ar' => $request->product_overview_ar,
            'product_description_en' => $request->product_description_en,
            'product_description_ar' => $request->product_description_ar,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('products.index')
            ->with('info', 'Product Updated without changing its images');
    }

    public function updateImgs(Request $request)
    {
        // get array of uploaded imgs
        $imgs = $request->multi_img;
        // get product name to include in save path
        $productName = Product::findOrFail($request->product_id)->product_name_en;

        foreach ($imgs as $id => $img)
        {
            $imgToDelete = ProductImg::findOrFail($id);

            if (file_exists($imgToDelete->img_name)) {
                unlink($imgToDelete->img_name);
            }

            $imgName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(917, 1000)
            ->save('uploads/products/product-multi-imgs/' . $productName . '/' . $imgName);
            $savePath = 'uploads/products/product-multi-imgs/' . $productName . '/' . $imgName;

            ProductImg::findOrFail($id)->update([
                'img_name' => $savePath,
                'updated_at' => Carbon::now()
            ]);

        }
        return redirect()->back()
            ->with('success', 'Product Images Updated');
    }

    // method for update product main thumb
    public function updateProductThumb(Request $request)
    {

        // validate the request
        $request->validate([
            'product_thumbnail' => 'required|mimes:jpg,png'
        ]);

        $productThumb = Product::findOrFail($request->product_id)->product_thumbnail;
        // delete old img
        if(file_exists($productThumb))
        {
            unlink($productThumb);
        }

        // get new product thumbnail
        $newThumb = $request->file('product_thumbnail');
        // generate unique name for new thumbnail
        $thumbGenName = hexdec(uniqid()) . '.' . $newThumb->getClientOriginalExtension();
        // save new thumbnail with image intervention
        Image::make($newThumb)->resize(917, 1000)
        ->save('uploads/products/product-thumbnails/' . $thumbGenName);

        $savePath = 'uploads/products/product-thumbnails/' . $thumbGenName;

        // update product with new thumbnails
        Product::findOrFail($request->product_id)->update([
            'product_thumbnail' => $savePath,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()
            ->with('success', 'Product Thumbnail Updated');
    }

    public function deleteImg($id)
    {
        $img = ProductImg::findOrFail($id);

        if (file_exists($img->img_name))
        {
            unlink($img->img_name);
        }

        $img->delete();
        return redirect()->back()
            ->with('error', 'Product Image Deleted');
    }

    // Activate Product
    public function activate($id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()
            ->with('success', 'Product Activated');
    }

    // DeActivate product
    public function deactivate($id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->back()
            ->with('error', 'Product DeActivated');
    }

    public function delete($id)
    {
        // get product images through one to many relationship
        $imgs = Product::findOrFail($id)->imgs;

        $product = Product::findOrFail($id);
        // foreach product image we delete every photo
        foreach ($imgs as $img)
        {
            // first delete every photo from directory
            unlink($img->img_name);
            // then delete image from the database
            $img->delete();
        }
        // and after that we delete folder of images
        rmdir(public_path('uploads/products/product-multi-imgs/' . $product->product_name_en));

        unlink($product->product_thumbnail);

        $product->delete();
        return redirect()->back()
            ->with('error', 'Product Deleted');
    }
}
