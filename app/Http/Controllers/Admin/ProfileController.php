<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileView()
    {
        $admin = Auth::guard('admin')->user();


        return view('admin.profile.profile-page', compact('admin'));
    }

    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit-profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {

        $adminId = $request->admin_id;

        $adminToUpdate = Admin::find($adminId);

        if ($request->hasFile('profile_photo_path'))
        {
            // get image in the form
            $profPic = $request->file('profile_photo_path');
            // generate new unique name for the image
            $picName = hexdec(uniqid()) . '.' . $profPic->getClientOriginalExtension();
            // delete picture from directory before upload another one
            if (!empty($adminToUpdate->profile_photo_path))
            {
                unlink($adminToUpdate->profile_photo_path);
            }

            // if directory not exsist it will be created and picture will be moved to it
            $profPic->move('uploads/profile-pics', $picName);

            $url = 'uploads/profile-pics/' . $picName;

            $adminToUpdate->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile_photo_path' => $url
            ]);

            return redirect()->route('admin.profile')
                ->with('success', 'Admin Profile updated successfully');
        }
        else
        {
            $adminToUpdate->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('admin.profile')
                ->with('success', 'Admin Profile updated successfully');
        }
    }

    public function changePassword()
    {
        $adminId = Auth::guard('admin')->user()->id;
        return view('admin.profile.change-password', compact('adminId'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        $currentPass = $request->current_password;
        $adminOldPass = Auth::guard('admin')->user()->password;
        $adminId = $request->admin_id;

        $adminUser = Admin::find($adminId);

        if (Hash::check($currentPass, $adminOldPass))
        {
            $adminUser->update([
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
