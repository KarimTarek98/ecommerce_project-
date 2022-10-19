<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionDistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'region_id',
        'district_name'
    ];

    public function city()
    {
        return $this->belongsTo(ShippingCity::class, 'city_id');
    }

    public function region()
    {
        return $this->belongsTo(CityRegion::class, 'region_id');
    }
}
