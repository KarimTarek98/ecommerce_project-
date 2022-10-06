<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function changePassword()
    {
        $userPic = Auth::user()->profile_photo_path;
        return view('app.users.change-password', compact('userPic'));
    }

    public function updatePass(Request $request)
    {
        $request->validate([
            'current_pass' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password|min:8'
        ]);

        $userPass = Auth::user()->password;

        $insertedPass = $request->current_pass;
        $userId = Auth::user()->id;
        $user = User::find($userId);

        if (Hash::check($insertedPass, $userPass))
        {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('login')
                ->with('success', 'Password Updated, Login again');
        }
        else
        {
            return redirect()->back()->with('error', 'Inserted value doesn\'t match');
        }
    }
}
