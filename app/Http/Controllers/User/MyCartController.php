<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        if (Session::has('coupon'))
        {
            Session::forget('coupon');
        }

        return response()->json([
            'success' => 'Product Removed From Your Cart'
        ]);
    }

    // increment cart item quantity
    public function incrementQty($rowId)
    {
        $cartItem = Cart::get($rowId);

        Cart::update($rowId, $cartItem->qty + 1);

        if (session()->has('coupon'))
        {
            $couponCode = session()->get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $couponCode)->first();

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => (Cart::total() * $coupon->coupon_discount) / 100,
                'total' => Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100
            ]);
        }

        return response()->json('increment');
    }

    // decrement cart item quantity
    public function decrementQty($rowId)
    {
        $cartItem = Cart::get($rowId);

        Cart::update($rowId, $cartItem->qty - 1);

        if (session()->has('coupon'))
        {
            $couponCode = session()->get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $couponCode)->first();

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => (Cart::total() * $coupon->coupon_discount) / 100,
                'total' => Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100
            ]);
        }

        return response()->json('decrement');
    }
}
