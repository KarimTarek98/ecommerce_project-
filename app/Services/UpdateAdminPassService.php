<?php

namespace App\Services;
use App\Http\Requests\UpdateAdminPasswordRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateAdminPassService
{
    public function updatePassword(UpdateAdminPasswordRequest $request)
    {
        if (Hash::check($request->current_password, Auth::guard('admin')->user()->password))
        {
            Admin::find($request->admin_id)->update([
                'password' => Hash::make($request->password)
            ]);

            auth('admin')->logout();

            return redirect('/admin/login')
                ->with('success', 'Admin Password Changed');
        }
        else
        {
            return redirect()->back()
                ->with('error', 'Something went wrong, try again');
        }
    }


}
