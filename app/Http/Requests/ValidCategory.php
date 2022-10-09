<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidCategory extends FormRequest
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
            'category_name_en' => 'required|string|max:30',
            'category_name_ar' => 'required|string|max:100',
            'category_icon' => 'required|string|max:100'
        ];
    }

    public function messages()
    {
        return [
            'category_name_en.required' => 'You must insert category name in English',
            'category_name_ar.required' => 'You must insert category name in Arabic',
            
        ];
    }
}
