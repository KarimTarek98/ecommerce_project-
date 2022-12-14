<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function brand()
    {
        return $this->hasOne(Partner::class, 'partner_id');
    }

    public function imgs()
    {
        return $this->hasMany(ProductImg::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    protected function productSlugEn(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower(str_replace(' ', '-', $value))
        );
    }

    protected function productSlugAr(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str_replace(' ', '-', $value)
        );
    }

    public function scopeCategory($query, $categoryId)
    {
        return $query->where('category_id', '=', $categoryId)
        ->get();
    }

    public function scopeSpecial($query, $attribute)
    {
        return $query->where($attribute, 1)
        ->limit(6)
        ->get();
    }
    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }
    public function scopeOrderDesc($query)
    {
        return $query->orderBy('id', 'DESC');
    }

    public function getRouteKeyName()
    {
        return 'product_slug_en';
    }
}
