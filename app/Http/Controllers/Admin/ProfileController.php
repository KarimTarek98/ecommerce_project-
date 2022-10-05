<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileView()
    {
        $admin = Auth::guard('admin')->user();


        return view('admin.profile-page', compact('admin'));
    }

    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.edit-profile', compact('admin'));
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
}
