<?php

namespace App\Services;
use App\Models\Admin;
use Illuminate\Http\Request;
class UpdateAdminProfileService
{
    public function updateProfile(Request $request)
    {
        $adminToUpdate = Admin::find($request->admin_id);

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

