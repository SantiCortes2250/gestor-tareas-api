<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

// CSRF cookie
Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

// Registro/Login/Logout
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Rutas protegidas
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['web'])->get('/test-session', function () {
    session(['test' => 'ok']);
    return session('test');
});







