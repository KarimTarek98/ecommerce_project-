<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function allCoupons()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.all', compact('coupons'));
    }

    public function addCoupon()
    {
        return view('admin.coupons.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|unique:coupons,coupon_code',
            'coupon_discount' => 'required|integer',
            'coupon_validity' => 'required|date',
        ]);

        Coupon::create([
            'coupon_code' => strtoupper($request->coupon_code),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity
        ]);

        return redirect()->route('admin.all-coupons')
            ->with('success', 'Coupon Added Successfully');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request)
    {
        $couponId = $request->coupon_id;
        $request->validate([
            'coupon_code' => 'required|unique:coupons,coupon_code,'. $couponId, // unique:table,column_to_check,id_to_ignore
            'coupon_discount' => 'required|integer',
            'coupon_validity' => 'required|date',
        ]);

        Coupon::findOrFail($couponId)->update([
            'coupon_code' => strtoupper($request->coupon_code),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);

        return redirect()->route('admin.all-coupons')
            ->with('info', 'Coupon Updated');
    }


    public function delete($id)
    {
        Coupon::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Coupon Deleted');
    }

}
