<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $brands = Partner::latest()->get();
        return view('admin.products.add-product', compact('categories', 'brands'));
    }
}
