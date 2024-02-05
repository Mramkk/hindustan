<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;



// --------------- Home Page -------------------- //

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/product/view/{id}', 'productView')->name('product.view');
    Route::view('/shop', 'web.shop');
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


// --------------- Admin Page -------------------- //

require __DIR__ . '/admin.php';
