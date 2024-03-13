<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/admin/user', [UserController::class, 'store'])->middleware(['auth:sanctum','isAdmin']);
