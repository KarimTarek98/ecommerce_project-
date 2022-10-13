<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'partner_id' => 'required|exists:partners,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'subsubcategory_id' => 'required|exists:sub_sub_categories,id',
            'product_name_en' => 'required|string',
            'product_name_ar' => 'required|string',
            'product_code' => 'required|integer',
            'product_qty' => 'required|integer',
            'product_tags_en' => 'required',
            'product_tags_ar' => 'required',
            'product_size_en' => 'required',
            'product_size_ar' => 'required',
            'product_color_en' => 'required',
            'product_color_ar' => 'required',
            'selling_price' => 'required|numeric',
            //'discount_price' => 'numeric',
            'product_thumbnail' => 'mimes:jpg,png',
            'product_overview_en' => 'required',
            'product_overview_ar' => 'required',
            'product_description_en' => 'required',
            'product_description_ar' => 'required',
        ];
    }
}
