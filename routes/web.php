<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckUserMiddleware;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'loginPage')->name('login.page')->middleware(CheckUserMiddleware::class);
    Route::post('user/login', 'userLogin')->name('user.login');
    Route::post('user/logout', 'userLogout')->name('user.logout');

    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::get('/dashboard', 'Dashboard')->name('dashboard');
        Route::resource('user', UserController::class);

        Route::controller(UserController::class)->group(function () {
            Route::get('user/status/{id}', 'userStatus')->name('user.status');
            Route::get('user/profile/{id}', 'userProfile')->name('user.profile');
        });
    });
});