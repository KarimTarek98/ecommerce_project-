<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_sub_category_name_en',
        'sub_sub_category_name_ar',
        'sub_sub_category_slug_en',
        'sub_sub_category_slug_ar',
        'category_id',
        'subcategory_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
