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
        $productImgs = ProductImg::where('product_id', '=', $id)->orderBy('id', 'DESC')->get();
        return view('app.products.product-details', compact('product', 'productImgs'));
    }
}
