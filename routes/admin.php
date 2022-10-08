<?php

use App\Http\Controllers\Admin\PartnerController;
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
        // Admin Profile Routes
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'profileView')->name('admin.profile');
            Route::get('/edit-profile', 'editProfile')->name('admin.edit-profile');
            Route::post('/update-profile', 'updateProfile')->name('admin.update-profile');
            Route::get('/change-password', 'changePassword')->name('admin.change-password');

            Route::post('/update-password', 'updatePassword')->name('admin.update-password');
        });
        // Admin Dashboard Partners Routes
        Route::prefix('partners')->group(function () {
            Route::controller(PartnerController::class)->group(function () {
                Route::get('/', 'allPartners')->name('admin.all-partners');
                Route::get('/add-partner', 'addPartnerView')->name('admin.add-partner');
                Route::post('/store-partners', 'storePartners')->name('admin.store-partner');
                Route::get('/edit/{id}', 'editPartnerPage')->name('admin.edit-partner');
                Route::post('/update-partner', 'updatePartner')->name('admin.update-partner');
                Route::get('/delete/{id}', 'deletePartner')->name('admin.delete-partner');
            });
        });

    });



    // logout route
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');



});

