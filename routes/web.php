<?php

use App\Http\Controllers\LectureController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('lecture', LectureController::class);
});
