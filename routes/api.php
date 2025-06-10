<?php

use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',   [AuthController::class, 'logout']);
