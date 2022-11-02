<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PartnerValid extends FormRequest
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
            'partner_name_en' => 'required|string|max:30',
            'partner_name_ar' => 'required|string|max:35',
            'partner_img' =>'required|image|mimes:png'
        ];
    }

    public function messages()
    {
        return [
            'partner_name_en.required' => 'You must insert partner name in English',
            'partner_name_en.string' => 'Partner Name should be string type',
            'partner_name_en.max' => 'Partner Name should be max of 30 character',
            'partner_name_ar.required' => 'You must insert partner name in Arabic',
            'partner_name_ar.string' => 'Partner Name should be string type',
            'partner_name_ar.max' => 'Partner Name should be max of 35 character',
            'partner_img.required' => 'You must insert partner image',
            'partner_img.image' => 'Partner Image should be image only',
            'partner_img.mimes' => 'Partner Image should type of png only',
        ];
    }
}
