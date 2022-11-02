<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'img_name',
    ];

    public function scopeGetId($q, $id)
    {
        return $q->where('product_id', $id)->get();
    }
}
