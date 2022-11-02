<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    public function stripeOrder(Request $request)
    {

        if (session()->has('coupon'))
        {
            $total = session()->get('coupon')['total'];
        }
        else
        {
            $total = Cart::total();
        }

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51LuuPlBLzGlcL4uo7z5w4oOoKa4QCj168wkByKZZVKpC2r6GuAmRFhM9pZaAamgOQ6UByb3PWPI6a2XPOnpaKkY800cFMqSM2B');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => round(($total * 100) / 19.6), // dollar value
            'currency' => 'usd',
            'description' => 'Starbuy Ecommerce Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);

        $orderId = Order::insertGetId([
            'user_id' => Auth::user()->id,
            'city_id' => $request->city_id,
            'region_id' => $request->region_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => round($total / 19.6),
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'Starbuy' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);

        // after saving the order to the database send email to user

        $order = Order::findOrFail($orderId);

        $data = [
            'invoice_no' => $order->invoice_no,
            'amount' => $order->amount,
            'name' => $order->name,
            'email' => $order->email
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        // get all items in shopphing cart
        $carts = Cart::content();

        // for each cart item insert order item in order_items table
        foreach ($carts as $cart)
        {
            OrderItem::insert([
                'order_id' => $orderId,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now()
            ]);
        }

        // after that delete the coupon if exists
        if (session()->has('coupon'))
        {
            session()->forget('coupon');
        }

        // and after that delete all cart items
        Cart::destroy();

        return redirect()->to('/')->with('success', 'Your Order has been placed');
    }
}

