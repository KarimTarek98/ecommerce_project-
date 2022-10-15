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
}
