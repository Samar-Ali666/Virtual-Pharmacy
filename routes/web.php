<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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

Route::get('/',[App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');  

Route::get('/shop/{id}', [App\Http\Controllers\ShopController::class, 'showCategoryProducts'])->name('category.product.show');

Route::get('/shop/sub/{id}', [App\Http\Controllers\ShopController::class, 'showSubcategoryProducts'])->name('subcategory.product.show');

Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'showSingleProduct'])->name('product.single');

Route::post('/shop/product/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('product.cart.add');

Route::delete('/shop/product/remove-from-cart/{id}', [App\Http\Controllers\CartController::class, 'removeCartProduct'])->name('product.cart.remove');

Route::any('shop/search', [App\Http\Controllers\ShopController::class, 'search'])->name('shop.search');

Route::get('/user/cart', [App\Http\Controllers\CartController::class, 'showUserCart'])->name('user.cart');

Route::get('/user/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('user.checkout'); 

Route::post('/user/checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('user.place.order');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user-shipped-orders', [App\Http\Controllers\HomeController::class, 'shippedOrder'])->name('user.shipped.orders');

Route::get('/user-recieved-orders', [App\Http\Controllers\HomeController::class, 'recievedOrder'])->name('user.recieved.orders');

Route::delete('/home/remove-order/{id}', [App\Http\Controllers\HomeController::class, 'removeOrder'])->name('order.remove');

Route::group(['prefix'=>'staff'], function() {
    
    Route::group(['middleware' => ['auth:staff', 'verified']], function() {
         
         Route::get('/', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.dashboard');

         Route::get('add-product-page', [App\Http\Controllers\StaffProductController::class, 'create'])->name('add.product.page');

         Route::post('add-product', [App\Http\Controllers\StaffProductController::class, 'store'])->name('staff.add.product');

         Route::get('pending-products', [App\Http\Controllers\StaffProductController::class, 'pendingProducts'])->name('staff.products.pending');

         Route::get('approved-products', [App\Http\Controllers\StaffProductController::class, 'approvedProducts'])->name('staff.products.approved');

         Route::get('products-details/{id}', [App\Http\Controllers\StaffProductController::class, 'productDetails'])->name('staff.product.details');
    });

    Route::get('/login', [App\Http\Controllers\Auth\StaffLoginController::class, 'showLoginForm'])->name('staff.login');

    Route::post('/login', [App\Http\Controllers\Auth\StaffLoginController::class, 'login'])->name('staff.login.submit');

    Route::post('/logout', [App\Http\Controllers\Auth\StaffLoginController::class, 'logout'])->name('staff.logout');

    Route::get('/register', [App\Http\Controllers\Auth\StaffRegisterController::class, 'showRegistrationForm'])->name('staff.register');

    Route::post('/register', [App\Http\Controllers\Auth\StaffRegisterController::class, 'register'])->name('staff.register.submit');
});

Route::group(['prefix' => 'admin'], function() {
    
    Route::group(['middleware' => 'auth:admin'], function() {
        
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/categories', [App\Http\Controllers\AdminCategoryController::class, 'index'])->name('categories.index');

        Route::post('/categories', [App\Http\Controllers\AdminCategoryController::class, 'store'])->name('categories.store');

        Route::get('/categories/edit/{id}', [App\Http\Controllers\AdminCategoryController::class, 'edit'])->name('categories.edit');

        Route::put('/categories/edit/{id}', [App\Http\Controllers\AdminCategoryController::class, 'update'])->name('category.update');

        Route::delete('/categories/delete/{id}', [App\Http\Controllers\AdminCategoryController::class, 'destroy'])->name('category.destroy');

        Route::get('categories/show/{id}', [App\Http\Controllers\AdminCategoryController::class, 'show'])->name('category.show');

        Route::post('categories/show/add-subcategory', [App\Http\Controllers\AdminSubcategoryController::class, 'store'])->name('category.subcategory.store');

        Route::get('categories/subcategory/edit/{id}', [App\Http\Controllers\AdminSubcategoryController::class, 'edit'])->name('category.subcategory.edit');

        Route::put('categories/subcategory/edit/{id}', [App\Http\Controllers\AdminSubcategoryController::class, 'update'])->name('category.subcategory.update');

        Route::delete('categories/subcategory/delete/{id}', [App\Http\Controllers\AdminSubcategoryController::class, 'destroy'])->name('category.subcategory.destroy');

        Route::get('/product', [App\Http\Controllers\AdminProductController::class, 'index'])->name('product.index');

        Route::get('product/create', [App\Http\Controllers\AdminProductController::class, 'create'])->name('product.create');

        Route::post('product/create', [App\Http\Controllers\AdminProductController::class, 'store'])->name('product.store');

        Route::get('product/show/{id}', [App\Http\Controllers\AdminProductController::class, 'show'])->name('product.show');

        Route::get('product/edit/{id}', [App\Http\Controllers\AdminProductController::class, 'edit'])->name('product.edit');

        Route::put('product/update/{id}', [App\Http\Controllers\AdminProductController::class, 'update'])->name('product.update');

        Route::put('product/update/status/{id}', [App\Http\Controllers\AdminProductController::class, 'changeStatus'])->name('product.update.status');

        Route::delete('product/delete/{id}', [App\Http\Controllers\AdminProductController::class, 'destroy'])->name('product.destroy');

        Route::get('pending-unapprove-products', [App\Http\Controllers\AdminProductController::class, 'getUnapproveProducts'])->name('admin.unaprrove.products');

        Route::get('current-orders', [App\Http\Controllers\AdminOrderController::class, 'index'])->name('admin.current.orders');

        Route::get('current-orders/details/{id}', [App\Http\Controllers\AdminOrderController::class, 'showDetails'])->name('order.detail');

        Route::put('current-orders/details/change-status/{id}', [App\Http\Controllers\AdminOrderController::class, 'changeOrderStatus'])->name('order.change.status');

        Route::get('shipped-orders', [App\Http\Controllers\AdminOrderController::class, 'shippedOrders'])->name('admin.shipped.orders');

        Route::get('completed-orders', [App\Http\Controllers\AdminOrderController::class, 'completedOrders'])->name('admin.completed.orders');

        Route::get('users', [App\Http\Controllers\AdminUserController::class, 'index'])->name('admin.users');

        Route::get('user/show/{id}', [App\Http\Controllers\AdminUserController::class,'show'])->name('admin.user.show');

        Route::get('staff', [App\Http\Controllers\AdminStaffController::class, 'index'])->name('admin.users');

        Route::get('staff/unapproved', [App\Http\Controllers\AdminStaffController::class, 'unapprovedStaff'])->name('admin.unapproved.members');

        Route::get('staff/show/{id}', [App\Http\Controllers\AdminStaffController::class, 'show'])->name('admin.staff.show');

        Route::any('staffs/search', [App\Http\Controllers\AdminStaffController::class, 'staffSearch'])->name('admin.staff.search');

        Route::put('staff/change-status/{id}', [App\Http\Controllers\AdminStaffController::class, 'changeStaffStatus'])->name('admin.staff.changeStatus');
    });

    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');

    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    
    Route::post('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');
});


