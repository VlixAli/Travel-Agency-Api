<?php

use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;

Route::controller(TravelController::class)->group(function () {
    Route::get('/', 'index');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/store', 'store')->middleware('isAdmin');
        Route::put('/{travel:slug}', 'update')->middleware('isEditor');
    });
});
