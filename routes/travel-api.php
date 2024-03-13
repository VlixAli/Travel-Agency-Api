<?php

use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/travels', [TravelController::class, 'index']);
Route::post('travels/store', [TravelController::class, 'store'])->middleware(['auth:sanctum','isAdmin']);
