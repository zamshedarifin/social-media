<?php

use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\frontend\ProfileController;

use App\Http\Controllers\backend\Admin\AdminDashboardController;
use App\Http\Controllers\backend\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('vlogger.guest')->group(function () {
    Route::get('/', [\App\Http\Controllers\frontend\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [\App\Http\Controllers\frontend\Auth\LoginController::class, 'login']);
    Route::get('/register', [\App\Http\Controllers\frontend\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\frontend\Auth\RegisterController::class, 'register'])->name('register');
});

Route::middleware('vlogger')->group(function () {
    Route::get('/logout',[\App\Http\Controllers\frontend\Auth\LoginController::class,'logout'])->name('logout');
    Route::get('/home',[FrontEndController::class,'index'])->name('homepage');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::get('/suggested-users', [\App\Http\Controllers\frontend\FollowController::class, 'suggested']);
    Route::post('/follow/{id}', [\App\Http\Controllers\frontend\FollowController::class, 'follow']);
    Route::post('/unfollow/{id}', [\App\Http\Controllers\frontend\FollowController::class, 'unfollow']);
    Route::get('/my-following', [\App\Http\Controllers\frontend\FollowController::class, 'myFollowing']);;
    Route::post('/posts', [\App\Http\Controllers\frontend\PostController::class, 'store']);
    Route::get('/followings/posts', [\App\Http\Controllers\frontend\PostController::class, 'postsFromFollowings']);
    Route::get('/notifications', [\App\Http\Controllers\frontend\PostController::class, 'notifications']);
    Route::post('/tags/{postId}/approve', [\App\Http\Controllers\frontend\PostController::class, 'approveTag']);

    Route::post('/posts/{post}/comments', [\App\Http\Controllers\frontend\PostInteractionController::class, 'addComment']);
    Route::post('/posts/{post}/gifts', [\App\Http\Controllers\frontend\PostInteractionController::class, 'sendGift']);
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/login',[ LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[ LoginController::class,'login'])->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        // AdminDashboardController
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    });

});
