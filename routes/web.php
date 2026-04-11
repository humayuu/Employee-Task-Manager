<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'loginPage')->name('login.page');
    Route::get('/dashboard', 'Dashboard')->name('dashboard');

    Route::post('user/login', 'userLogin')->name('user.login');
    Route::post('user/logout', 'userLogout')->name('user.logout');
});
