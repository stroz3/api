<?php

use App\Http\Controllers\Api\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Api\Admin\ExponentController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function () {
        return Auth::user();
    });
    Route::middleware('is_user')->group(function () {
        //
    });
});

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::prefix('admin')->group(function () {
    Route::middleware(['auth:sanctum', 'is_admin'])->group(function () {
        Route::resource('exponents', ExponentController::class);
    });
    Route::post('login', [AdminLoginController::class, 'login']);
});

