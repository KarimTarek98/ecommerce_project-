<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Models\CityRegion;
use App\Models\ShippingCity;
use Illuminate\Http\Request;

class CityRegionController extends Controller
{
    public function allRegions()
    {
        $regions = CityRegion::orderBy('region_name', 'ASC')->get();

        return view('admin.shipping.regions.all', compact('regions'));
    }

    public function addRegion()
    {
        $cities = ShippingCity::orderBy('city_name', 'ASC')->get();

        return view('admin.shipping.regions.add', compact('cities'));
    }

    public function storeRegion(Request $request)
    {
        $request->validate([
            'city_id' => 'required|integer|exists:shipping_cities,id',
            'region_name' => 'required|string|unique:city_regions,region_name'
        ]);

        CityRegion::create([
            'city_id' => $request->city_id,
            'region_name' => $request->region_name
        ]);

        return redirect()->route('admin.all-regions')
            ->with('success', 'Region Added');
    }

    public function editRegion($id)
    {
        $region = CityRegion::findOrFail($id);

        $cities = ShippingCity::orderBy('city_name', 'ASC')
        ->where('id', '!=', $region->city_id)
        ->get();

        return view('admin.shipping.regions.edit', compact('cities', 'region'));
    }

    public function updateRegion(Request $request)
    {
        $regionId = $request->region_id;

        $request->validate([
            'city_id' => 'required|integer|exists:shipping_cities,id',
            'region_name' => 'required|string|unique:city_regions,region_name,'
        ]);

        CityRegion::findOrFail($regionId)->update([
            'city_id' => $request->city_id,
            'region_name' => $request->region_name
        ]);

        return redirect()->route('admin.all-regions')
            ->with('info', 'Region Updated');
    }

    public function deleteRegion($id)
    {
        CityRegion::findOrFail($id)->delete();

        return redirect()->route('admin.all-regions')
            ->with('success', 'Region Deleted');
    }
}
