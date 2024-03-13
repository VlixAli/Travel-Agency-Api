<?php

use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::get('/travels/{travel:slug}/tours', [TourController::class, 'index']);
Route::post('/travels/{travel:slug}/tours', [TourController::class, 'store'])
    ->middleware(['auth:sanctum', 'isAdmin']);
