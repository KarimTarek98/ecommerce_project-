<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\CityRegion;
use App\Models\RegionDistrict;
use App\Models\ShippingCity;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkoutRedirect()
    {
        if (Auth::check())
        {
            if (Cart::total() > 0)
            {

                $cart = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $cities = ShippingCity::orderBy('city_name', 'ASC')->get();

                return view('app.checkout.checkout-view',compact('cart','cartQty','cartTotal', 'cities'));
            }
            else
            {
                return redirect()->to('/')
                ->with('error', 'Add one product at least to your cart');
            }


        }
        else
        {

            return redirect()->to('/login')->with('error', 'You Should login first');
        }
    }

    public function getRegions($city_id)
    {
        $regions = CityRegion::where('city_id', '=', $city_id)
            ->orderBy('region_name', 'ASC')->get();

        return json_encode($regions);
    }

    public function getDistricts($region_id)
    {
        $districts = RegionDistrict::where('region_id', $region_id)->get();

        return json_encode($districts);
    }

    public function checkoutProceed(Request $request)
    {
        $data = [];

        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] =$request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['city_id'] = $request->city_id;
        $data['region_id'] = $request->region_id;
        $data['district_id'] = $request->district_id;
        $data['notes'] = $request->notes;


        if ($request->payment_method == 'stripe')
        {
            return view('app.payment.stripe', compact('data'));
        }
        elseif ($request->payment_method == 'card')
        {
            return 'card';
        }
        else
        {
            return 'Cash On Delivery';
        }


    }
}
