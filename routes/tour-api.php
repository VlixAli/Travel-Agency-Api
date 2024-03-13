<?php

use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::controller(TourController::class)->prefix('/{travel:slug}/tours')
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->middleware(['auth:sanctum', 'isAdmin']);
    });
