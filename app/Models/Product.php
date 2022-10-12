<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brand()
    {
        return $this->hasOne(Partner::class, 'partner_id');
    }

    public function imgs()
    {
        return $this->hasMany(ProductImg::class, 'product_id');
    }
}
