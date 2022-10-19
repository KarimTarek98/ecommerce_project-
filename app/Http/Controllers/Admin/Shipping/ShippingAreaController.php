<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Models\ShippingCity;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function allCities()
    {
        $cities = ShippingCity::orderBy('city_name', 'ASC')->get();

        return view('admin.shipping.cities.all', compact('cities'));
    }

    public function addCity()
    {
        return view('admin.shipping.cities.add');
    }

    public function storeCity(Request $request)
    {
        $request->validate([
            'city_name' => 'required|string|unique:shipping_cities,city_name'
        ]);

        ShippingCity::create([
            'city_name' => $request->city_name
        ]);

        return redirect()->route('admin.all-cities')
            ->with('success', 'City Added');
    }

    public function edit($id)
    {
        $city = ShippingCity::findOrFail($id);

        return view('admin.shipping.cities.edit', compact('city'));
    }

    public function update(Request $request)
    {
        $cityId = $request->city_id;

        $request->validate([
            'city_name' => 'required|string|unique:shipping_cities,city_name,' . $cityId
        ]);

        ShippingCity::findOrFail($cityId)->update([
            'city_name' => $request->city_name
        ]);

        return redirect()->route('admin.all-cities')
            ->with('info', 'City Updated');
    }

    public function delete($id)
    {
        ShippingCity::findOrFail($id)->delete();

        return redirect()->route('admin.all-cities')
            ->with('success', 'City Deleted');
    }
}
