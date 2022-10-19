<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Models\CityRegion;
use App\Models\RegionDistrict;
use App\Models\ShippingCity;
use Illuminate\Http\Request;

class RegionDistrictController extends Controller
{
    public function allDistricts()
    {
        $districts = RegionDistrict::with('city', 'region')
            ->orderBy('district_name', 'ASC')->get();

        return view('admin.shipping.districts.all', compact('districts'));
    }

    public function addDistrict()
    {
        $cities = ShippingCity::orderBy('city_name', 'ASC')->get();
        return view('admin.shipping.districts.add', compact('cities'));
    }

    public function getRegions($cityId)
    {
        $regions = CityRegion::where('city_id', '=', $cityId)
            ->orderBy('region_name', 'ASC')->get();

        return json_encode($regions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|integer|exists:shipping_cities,id',
            'region_id' => 'required|integer|exists:city_regions,id',
            'district_name' => 'required|string|unique:region_districts'
        ]);

        RegionDistrict::create([
            'city_id' => $request->city_id,
            'region_id' => $request->region_id,
            'district_name' => $request->district_name
        ]);

        return redirect()->route('admin.all-districts')
            ->with('success', 'District Added');
    }
}
