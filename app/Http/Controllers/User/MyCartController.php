<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function cartView()
    {
        return view('app.products.my-cart');
    }

    public function cartGetProducts()
    {
        $cart = Cart::content();
        $cartQuantity = Cart::count();
        $total = Cart::total();


        return response()->json([
            'cart' => $cart,
            'qty' => $cartQuantity,
            'total' => $total
        ]);
    }

    public function removeCartItem($id)
    {
        Cart::remove($id);

        return response()->json([
            'success' => 'Product Removed From Your Cart'
        ]);
    }

    // increment cart item quantity
    public function incrementQty($rowId)
    {
        $cartItem = Cart::get($rowId);

        Cart::update($rowId, $cartItem->qty + 1);

        return response()->json('increment');
    }

    // decrement cart item quantity
    public function decrementQty($rowId)
    {
        $cartItem = Cart::get($rowId);

        Cart::update($rowId, $cartItem->qty - 1);

        return response()->json('decrement');
    }
}
