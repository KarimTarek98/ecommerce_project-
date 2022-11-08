<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'partner_name_en',
        'partner_name_ar',
        'partner_slug_en',
        'partner_slug_ar',
        'partner_img',
    ];

    public static function mkdir()
    {
        if (!file_exists(public_path('uploads/partners')))
        {
            mkdir(public_path('uploads/partners'), 666, true);
        }
    }

    public static function scopeLatest($q)
    {
        return $q->latest()->get();
    }

    public function getRouteKeyName()
    {
        return 'partner_slug_en';
    }
}
