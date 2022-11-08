<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSubCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::guard('admin')->check();
    }


    public function rules()
    {
        return [
            'subcategory_name_en' => 'required|string|max:30',
            'subcategory_name_ar' => 'required|string|max:30',
            'category_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'subcategory_name_en.required' => 'Please insert Subcategory name in English',
            'subcategory_name_ar.required' => 'Please insert Subcategory name in Arabic',
        ];
    }
}
