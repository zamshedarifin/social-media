<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FollowController;

Route::middleware('vlogger')->group(function () {
    Route::get('/suggested-users', [FollowController::class, 'suggested']);
});
