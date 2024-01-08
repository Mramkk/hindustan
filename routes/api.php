<?php

use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\Brand\ApiBrandController;
use App\Http\Controllers\Api\Category\ApiCategoryController;
use App\Http\Controllers\Api\User\ApiUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ApiAuthController::class)->group(function () {
        Route::any('/auth/logout', 'logout');
    });
    Route::controller(ApiUserController::class)->group(function () {
        Route::any('/user', 'data');
    });
    Route::controller(ApiCategoryController::class)->group(function () {
        Route::any('/category', 'data');
    });
    Route::controller(ApiBrandController::class)->group(function () {
        Route::any('/brand', 'data');
    });
});

Route::controller(ApiAuthController::class)->group(function () {
    Route::any('/auth/send/otp', 'sendOTP');
    Route::any('/auth/verify/otp', 'verifyOTP');
});
