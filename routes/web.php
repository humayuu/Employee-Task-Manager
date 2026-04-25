<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckStatusMiddleware;
use App\Http\Middleware\CheckUserMiddleware;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'loginPage')->name('login.page')->middleware(CheckUserMiddleware::class);
    Route::post('user/login', 'userLogin')->name('user.login');
    Route::post('user/logout', 'userLogout')->name('user.logout');

    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::get('/dashboard', 'Dashboard')->name('dashboard')->middleware(CheckStatusMiddleware::class);
        Route::resource('user', UserController::class);
        Route::resource('task', TaskController::class);
        Route::get('user/task/{id}', [TaskController::class, 'userTask'])->name('user.task');
        Route::get('user/task/edit/{id}', [TaskController::class, 'userEditTask'])->name('user.edit.task');
        Route::put('user/task/update/{id}', [TaskController::class, 'userTaskUpdate'])->name('user.task.update');
        Route::get('task/filter/all', [TaskController::class, 'filterAllTask'])->name('filter.all.task');
        Route::get('task/filter/pending', [TaskController::class, 'filterPendingTask'])->name('filter.pending.task');
        Route::get('task/filter/overdue', [TaskController::class, 'filterOverdueTask'])->name('filter.overdue.task');
        Route::get('task/filter/complete', [TaskController::class, 'filterCompleteTask'])->name('filter.complete.task');

        Route::controller(UserController::class)->group(function () {
            Route::get('user/status/{id}', 'userStatus')->name('user.status');
            Route::get('user/change/password', 'userChangePassword')->name('user.change.password');
            Route::get('user/profile/{id}', 'userProfile')->name('user.profile');
            Route::put('user/profile/update/{id}', 'userProfileUpdate')->name('user.profile.update');
            Route::put('user/password/update/{id}', 'userPasswordUpdate')->name('user.password.store');
        });
    });
});
