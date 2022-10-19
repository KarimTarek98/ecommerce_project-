<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    // add to wishlist method
    public function addToWishlist(Request $request, $productId)
    {
        // if user not logged in, product cannot be added to wishlist
        if (Auth::check())
        {
            // check if product exsist in wishlists table
            $exsist = Wishlist::where('user_id', '=', Auth::user()->id)
                ->where('product_id', '=', $productId)->first();

            // check if the product already exsists in wishlist table
            if (!$exsist)
            {
                Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $productId,
                    'created_at' => Carbon::now()
                ]);

                return response()->json([
                    'success' => 'Product Added to Your Wishlist'
                ]);
            }
            else
            {
                return response()->json([
                    'error' => 'Product already exsists into Your Wishlist'
                ]);
            }
        }
        else
        {
            return response()->json([
                'error' => 'You should login first please'
            ]);
        }
    }

    // Coupon Apply method
    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)
            ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
            ->first();

        if ($coupon)
        {

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => (Cart::total() * $coupon->coupon_discount) / 100,
                'total' => Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100
            ]);

            return response()->json([
                'success' => 'Coupon Applied'
            ]);
        }
        else
        {
            return response()->json([
                'error' => 'Invalid Coupon'
            ]);
        }
    }

    public function calcDiscount()
    {
        // Check if coupon is applied
        if (session()->has('coupon'))
        {
            return response()->json([
                'total_before_discount' => Cart::total(),
                'coupon_code' => session()->get('coupon')['coupon_code'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_after_discount' => session()->get('coupon')['total']
            ]);
        }
        else
        {
            return response()->json([
                'total' => Cart::total()
            ]);
        }
    }
}
