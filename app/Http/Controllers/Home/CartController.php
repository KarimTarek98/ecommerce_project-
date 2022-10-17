<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Add to cart check if product has discount or not
        if ($product->discount_price != null)
        {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color
                ]
            ]);

            return response()->json([
                'success' => 'Product Added to Your Cart'
            ]);
        }
        else
        {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color
                ]
            ]);

            return response()->json([
                'success' => 'Product Added to Your Cart'
            ]);
        }


    }

    public function shoppingCart()
    {
        $cart = Cart::content();

        $cartItems = Cart::count();

        $cartTotal = Cart::total();

        return response()->json([
            'cart' => $cart,
            'cartItems' => $cartItems,
            'total' => $cartTotal
        ]);
    }

    public function removeCartItem($rowId)
    {
        Cart::remove($rowId);

        return response()->json([
            'success' => 'Product Removed from your cart'
        ]);
    }
}
