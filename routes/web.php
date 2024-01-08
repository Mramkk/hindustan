<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Brand\AdminBrandController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Admin\Unit\AdminUnitController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;



// --------------- Home Page -------------------- //

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/product/view', 'productView')->name('product.view');
    Route::view('/shop', 'web.shop');
});



// --------------- Admin Page -------------------- //

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // Product Route
    Route::controller(AdminProductController::class)->group(function () {
        Route::get('/product/create', 'index')->name('product.create');
        Route::post('/product/save', 'save')->name('product.save');
        Route::get('/product/table', 'product')->name('product.table');
        Route::post('/product/status', 'status');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/edit', 'update')->name('product.update');
        Route::post('/product/delete', 'deleteProduct');
    });

    // Category Route
    Route::controller(AdminCategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::post('/category/add', 'save')->name('category.add');
        Route::post('/category/status', 'status');
        Route::post('/category/delete', 'deleteCategory');
    });

    // Brand Name Route
    Route::controller(AdminBrandController::class)->group(function () {
        Route::get('/brand', 'index')->name('brand');
        Route::post('/brand/add', 'save')->name('brand.add');
        Route::post('/brand/status', 'status');
        Route::post('/brand/delete', 'deleteBrand');
    });

    // Unit Name Route
    Route::controller(AdminUnitController::class)->group(function () {
        Route::get('/unit', 'index')->name('unit');
        Route::post('/unit/add', 'save')->name('unit.add');
        Route::post('/unit/status', 'status');
        Route::post('/unit/delete', 'deleteUnit');
    });
});




// --------------- User Register & Login Routes -------------------- //

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', function () {
        return redirect()->route('home');
    })->middleware('guest')->name('login');
    Route::post('/login', 'login')->middleware('guest')->name('user.login');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/logout', 'logout');
});
