<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('v1/health', [Controllers\HealthController::class, 'check']);

Route::group(['prefix' => 'v1/users'], function () {
    Route::get('/', [Controllers\UserController::class, 'all'])->name('allUsers');
    Route::get('{user_id}', [Controllers\UserController::class, 'show'])->name('showUsers');
    Route::post('/transfer', [Controllers\UserController::class, 'transfer'])->name('transfer');
});
