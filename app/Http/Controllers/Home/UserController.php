<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You logged out successfully');
    }

    public function editProfile()
    {
        $userId = Auth::user()->id;

        $user = User::find($userId);

        return view('app.users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'profile_photo_path' => 'mimes:jpg,png'
        ]);

        $userId = Auth::user()->id;

        $userToUpdate = User::findOrFail($userId);

        // update with profile picture
        if ($request->hasFile('profile_photo_path'))
        {
            $profPic = $request->file('profile_photo_path');

            $picNewName = hexdec(uniqid()) . '.' . $profPic->getClientOriginalExtension();

            if (!empty($userToUpdate->profile_photo_path))
            {
                unlink($userToUpdate->profile_photo_path);
            }

            $profPic->move('uploads/user-profile-pics', $picNewName);

            $savePath = 'uploads/user-profile-pics/' . $picNewName;

            $userToUpdate->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'profile_photo_path' => $savePath
            ]);

            return redirect()->route('dashboard')->with('success', 'Profile Updated Successfully');
        }
        else
        {
            // update user without changing profile picture
            $userToUpdate->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            return redirect()->route('dashboard')->with('success', 'Profile Updated Successfully');
        }
    }
}
