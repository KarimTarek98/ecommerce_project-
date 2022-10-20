<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'city_id',
        'region_id',
        'district_id',
        'shipping_name',
        'shipping_email',
        'shipping_phone',
        'post_code',
        'notes',
    ];
}
