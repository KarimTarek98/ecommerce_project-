<?php

use App\Http\Controllers\Home\ProductDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Home\LangController;
use App\Http\Controllers\Home\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Homepage
Route::get('/', [IndexController::class, 'index']);

Route::controller(IndexController::class)->group(function () {
    Route::get('/products/{tag}', 'productsByTags');
    // To get all products by subcategory
    Route::get('/products/{subcat_id}/{slug}', 'subCategoriesProducts');
    // To get all product by sub-subcategory
    Route::get('/products/sub&sub/{sub_subcat_id}/{slug}', 'subSubCatProducts');
});



// return user to dashboard if authenticated
Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('dashboard', compact('user'));
    })->name('dashboard');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/logout', 'logout')->name('user.logout');
    Route::get('/user/edit-profile', 'editProfile')->name('user.edit-profile');
    Route::post('/update-profile', 'updateProfile')->name('update.user-profile');
    Route::get('/user/change-password', 'changePassword')->name('change-password.user');
    Route::post('/user/update-pass', 'updatePass')->name('update.user-password');
});

// Multilingual Routes
Route::get('/ar', [LangController::class, 'arabic'])->name('lang.ar');
Route::get('/en', [LangController::class, 'english'])->name('lang.en');

// Product Details Routes
Route::controller(ProductDetailsController::class)->group(function () {
    Route::get('/product-details/{id}/{slug}', 'index');
});






