<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Shipping\CityRegionController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Shipping\RegionDistrictController;
use App\Http\Controllers\Admin\Shipping\ShippingAreaController;
use App\Http\Controllers\Admin\SliderController;
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
                // Ajax Routes
                Route::get('/get/{category_id}', 'getSubCat');
                Route::get('/getsubsub/{subcategory_id}', 'getSubSub');

                Route::post('/store', 'storeProduct')->name('admin.store-product');

                Route::get('/manage', 'viewProducts')->name('admin.manage-products');
                // route for edit product page
                Route::get('/edit/{id}', 'edit')->name('admin.edit-product');
                // route for update product
                Route::post('/update', 'updateProduct')->name('admin.update-product');
                // Route for update product multiple images
                Route::post('/update-imgs', 'updateImgs')->name('admin.update-product-imgs');
                // Route for update product main thumbnail
                Route::post('/update-thumb', 'updateProductThumb')
                    ->name('admin.update-thumb');

                Route::get('/delete-img/{img_id}', 'deleteImg')->name('delete-product-img');
                // Deactivate Product
                Route::get('/deactivate/{id}', 'deactivate')->name('deactivate.product');
                // Activate Product
                Route::get('/activate/{id}', 'activate')->name('activate.product');

                // Delete product with its images
                Route::get('/delete/{id}', 'delete')->name('admin.product-delete');

            });

        });

        // All Slider Routes
        Route::prefix('sliders')->group(function () {

            Route::controller(SliderController::class)->group(function () {
                Route::get('/', 'allSliders')->name('admin.all-sliders');
                Route::get('/add-slider', 'addSliderView')->name('admin.add-slider');
                Route::post('/store-slider', 'storeSlider')->name('admin.store-slider');
                Route::get('/edit/{id}', 'editSliderPage')->name('admin.edit-slider');
                Route::post('/update-slider', 'updateSlider')->name('admin.update-slider');

                Route::get('/deactivate/{id}', 'deActivate')->name('deactivate.slider');
                Route::get('/activate/{id}', 'activate')->name('activate.slider');
                Route::get('/delete/{id}', 'deleteSlider')->name('admin.delete-slider');
            });

        });

        // All Routes for coupons
        Route::prefix('coupons')->group(function () {
            Route::controller(CouponController::class)->group(function () {
                Route::get('/', 'allCoupons')->name('admin.all-coupons');

                // add coupon route
                Route::get('/add', 'addCoupon')->name('admin.add-coupon');

                // store coupon route
                Route::post('/store', 'store')->name('admin.store-coupon');
                // edit coupon page
                Route::get('/edit/{id}', 'edit')->name('admin.edit-coupon');
                // update coupon
                Route::post('/update', 'update')->name('admin.update-coupon');
                // delete coupon route
                Route::get('/delete/{id}', 'delete')->name('admin.delete-coupon');
            });
        });

        // All Routes For Shipping Area
        Route::prefix('shipping')->group(function () {

            Route::controller(ShippingAreaController::class)->group(function () {
                Route::get('/', 'allCities')->name('admin.all-cities');
                Route::get('/add', 'addCity')->name('admin.shipping.add-city');
                Route::post('/store', 'storeCity')->name('admin.shipping.store-city');
                Route::get('/edit/{id}', 'edit')->name('admin.shipping.edit-city');
                Route::post('/update', 'update')->name('admin.shipping.update-city');
                Route::get('/delete/{id}', 'delete')->name('admin.shipping.delete-city');
            });

            Route::controller(CityRegionController::class)->group(function () {
                Route::get('/regions', 'allRegions')
                    ->name('admin.all-regions');

                Route::get('/add-region', 'addRegion')
                    ->name('admin.add-city-region');

                Route::post('/store', 'storeRegion')
                    ->name('admin.shipping.store-region');

                Route::get('/edit/{id}', 'editRegion')
                    ->name('admin.shipping.edit-region');

                Route::post('/update', 'updateRegion')
                    ->name('admin.shipping.update-region');

                Route::get('/delete-region/{id}', 'deleteRegion')
                    ->name('admin.shipping.delete-region');
            });

            Route::controller(RegionDistrictController::class)->group(function () {

                Route::get('/region-districts', 'allDistricts')
                    ->name('admin.all-districts');

                Route::get('/region-districts/add', 'addDistrict')
                    ->name('admin.add-region-district');

                // get regions with using ajax
                Route::get('/get-regions/{cityId}', 'getRegions');

                Route::post('/store-district', 'store')->name('admin.shipping.store-district');

            });

        });

    });



    // logout route
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');



});

