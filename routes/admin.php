<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;


Route::prefix('admin')->group(function () {

    // Routes for admin login
    Route::middleware('admin:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'loginForm']);
        Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
    });

    // if authenticated return to dashboard
    Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard')->middleware('auth:admin');

    });

    Route::middleware('auth:admin')->group(function () {

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'profileView')->name('admin.profile');
            Route::get('/edit-profile', 'editProfile')->name('admin.edit-profile');
            Route::post('/update-profile', 'updateProfile')->name('admin.update-profile');
        });

    });



    // logout route
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');



});

