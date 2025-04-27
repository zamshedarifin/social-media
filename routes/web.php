<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontEndController::class,'index'])->name('homepage');
Route::get('/profile',[ProfileController::class,'index'])->name('profile');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/login',[ LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[ LoginController::class,'login'])->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        // AdminDashboardController
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    });

});
