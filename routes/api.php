<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Semua ini otomatis di-prefix /api (dari RouteServiceProvider)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
dd('API route file is loaded');
