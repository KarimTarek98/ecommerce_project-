<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')
                    ->get();
        $category1 = Category::skip(0)->first();
        $category1Products = Product::where('category_id', '=', $category1->id)
        ->orderBy('id', 'DESC')->get();

        $category2 = Category::skip(1)->first();
        $category2Products = Product::where('category_id', $category2->id)
        ->orderBy('id', 'DESC')->get();


        return view('app.index',
        compact('category1Products', 'category1', 'category2', 'category2Products', 'categories'));
    }

    public function productsByTags($tag)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')
                    ->get();

        $tagProducts = Product::where('product_tags_en', $tag)->orderBy('id', 'DESC')
        ->paginate(3);

        return view('app.products.products-by-tags', compact('categories', 'tagProducts'));
    }

    public function subCategoriesProducts($subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)
        ->orderBy('id', 'DESC')->paginate(6);

        $categories = Category::orderBy('category_name_en', 'ASC')
            ->get();

        return view('app.products.subcategory-products',
        compact('products', 'categories'));
    }

    public function subSubCatProducts($sub_subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subsubcategory_id', $sub_subcat_id)
        ->orderBy('id', 'DESC')->paginate(6);

        $categories = Category::orderBy('category_name_en', 'ASC')
            ->get();

            return view('app.products.sub-subcategory-products',
            compact('products', 'categories'));


    }

    public function productInfoAjax($id)
    {
        $product = Product::with('category', 'partner')->findOrFail($id);

        if ($product->product_color_en != null)
        {
            $productColors = explode(',', $product->product_color_en);
        }
        else
        {
            $productColors = '';
        }

        if ($product->product_size_en != null)
        {
            $productSizes = explode(',', $product->product_size_en);
        }
        else
        {
            $productSizes = '';
        }



        $productSizes = explode(',', $product->product_size_en);

        return response()->json([
            'product' => $product,
            'colors' => $productColors,
            'sizes' => $productSizes
        ]);

    }
}
