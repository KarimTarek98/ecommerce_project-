<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'region_name'
    ];

    public function city()
    {
        return $this->belongsTo(ShippingCity::class, 'city_id');
    }
}
