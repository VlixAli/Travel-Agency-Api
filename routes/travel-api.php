<?php

use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/travels', [TravelController::class, 'index']);
