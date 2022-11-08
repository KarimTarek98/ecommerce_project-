<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminPasswordRequest;
use App\Services\UpdateAdminPassService;
use App\Services\UpdateAdminProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index', [
            'admin' => Auth::guard('admin')->user()
        ]);
    }

    public function edit()
    {
        return view('admin.profile.edit', ['admin' => Auth::guard('admin')->user()]);
    }

    public function update(UpdateAdminProfileService $admin, Request $request)
    {
        return $admin->updateProfile($request);
    }

    public function changePassword()
    {
        return view('admin.profile.change-password', [
            'adminId' => Auth::guard('admin')->user()->id
        ]);
    }

    public function updatePassword(UpdateAdminPasswordRequest $request, UpdateAdminPassService $admin)
    {
        return $admin->updatePassword($request);
    }
}
