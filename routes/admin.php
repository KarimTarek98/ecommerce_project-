<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
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

        // Admin Dashboard Categories Routes
        Route::prefix('categories')->group(function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/', 'allCategories')->name('admin.all-categories');

                Route::get('/add', 'addCategory')->name('admin.add-category');

                Route::post('/store', 'storeCategory')->name('admin.store-category');

                Route::get('/edit/{id}', 'editCategory')->name('admin.edit-category');

                Route::post('/update', 'updateCategory')->name('admin.update-category');

                Route::get('/delete/{id}', 'deleteCategory')->name('admin.delete-category');
            });
        });
        // All Routes for admin subcategories
        Route::prefix('sub')->group(function () {

            Route::controller(SubCategoryController::class)->group(function () {

                Route::get('/', 'all')->name('admin.subcategories');

                Route::get('/add', 'add')->name('admin.add-subcategory');
                Route::post('/store', 'store')->name('admin.store-subcategory');

                Route::get('/edit/{id}', 'edit')->name('admin.edit-subcategory');
                Route::post('/update', 'update')->name('admin.update-subcategory');
                Route::get('/del/{id}', 'delete')->name('admin.delete-subcategory');

            });

        });

        // All Routes for admin subsubcategories
        Route::prefix('sub-sub')->group(function () {
            Route::controller(SubSubCategoryController::class)->group(function () {
                Route::get('/', 'all')->name('admin.sub-subcategories');
                Route::get('/add', 'add')->name('admin.add-subsubcategory');
                // route to fetch subcategories with ajax
                Route::get('/get/{category_id}', 'getSubcategories');

                Route::post('/store', 'store')->name('sub-subcategory.store');

                Route::get('/edit/{id}', 'edit')->name('sub-subcategory.edit');

                Route::post('/update', 'update')->name('sub-subcategory.update');
                Route::get('/delete/{id}', 'delete')->name('sub-subcategory.delete');
            });
        });

        // Routes for products
        Route::prefix('products')->group(function () {

            Route::controller(ProductController::class)->group(function () {

                Route::get('/add', 'addProduct')->name('admin.add-product');

            });

        });

    });



    // logout route
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');



});

