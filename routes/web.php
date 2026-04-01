<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::middleware(['auth',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
