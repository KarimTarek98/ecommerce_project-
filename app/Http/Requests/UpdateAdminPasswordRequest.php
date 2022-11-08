<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAdminPasswordRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::guard('admin')->check();
    }


    public function rules()
    {
        return [
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|string|min:8|same:password',
        ];
    }
}
