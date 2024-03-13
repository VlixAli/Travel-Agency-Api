<?php

use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::get('/travels/{travel:slug}/tours', [TourController::class, 'index']);
