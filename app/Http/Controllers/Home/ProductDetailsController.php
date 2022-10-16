<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImg;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($id, $slug)
    {
        $product = Product::findOrFail($id);

        if ($product->product_color_en != null)
        {
            $productColors = explode(',', $product->product_color_en);
        }
        else
        {
            $productColors = [];
        }

        if ($product->product_size_en != null)
        {
            $productSizes = explode(',', $product->product_size_en);
        }
        else
        {
            $productSizes = [];
        }

        // get related products
        $relatedProducts = Product::where('status', 1)->where('category_id', '=', $product->category_id)
        ->where('id', '!=', $id)->orderBy('id', 'DESC')->get();


        $productImgs = ProductImg::where('product_id', '=', $id)->orderBy('id', 'DESC')->get();
        return view('app.products.product-details',
        compact('product', 'productImgs', 'productColors', 'productSizes', 'relatedProducts'));
    }
}
