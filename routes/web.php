<?php

use App\Http\Controllers\Home\ProductDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Home\LangController;
use App\Http\Controllers\Home\UserController;
use App\Http\Controllers\User\MyCartController;
use App\Http\Controllers\User\WishlistController;
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
    // fetch product info with ajax
    Route::get('/product/cart/modal/{id}', 'productInfoAjax');
});

Route::controller(CartController::class)->group(function () {
    // Add to cart using ajax
    Route::post('/cart/add-product/{id}', 'addToCart');
    // Get shopping cart info ajax
    Route::get('/shoppin-cart/get', 'shoppingCart');

    // Remove cart item ajax
    Route::get('/cart/remove/{rowId}', 'removeCartItem');

    // add product to wishlist
    Route::post('/wishlist/insert/{productId}', 'addToWishlist');
});

// Wishlist routes
Route::middleware(['auth', 'user'])->group(function () {

    // Wish list routes with ajax
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist', 'wishlistView')->name('wishlist');
        Route::get('/wishlist/get-items', 'wishlistGetItems');
        Route::get('/wishlist/remove-item/{id}', 'removeItem');
    });

});


// My Cart routes with ajax
Route::controller(MyCartController::class)->group(function () {
    Route::get('/my-cart', 'cartView')->name('my-cart');

    Route::get('/my-cart/get-products', 'cartGetProducts');
    // remove item from cart
    Route::get('/cart/remove-item/{id}', 'removeCartItem');

    // increment cart item quantity
    Route::get('/increment-qty/{rowId}', 'incrementQty');

    // decrement cart item quantity
    Route::get('/decrement-qty/{rowId}', 'decrementQty');
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






