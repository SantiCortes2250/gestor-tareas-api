<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// CSRF cookie
Route::get('/sanctum/csrf-cookie', function () {
    return response()->json(['csrf' => 'ok']);
});


// API

Route::get('/', function () {
    return response()->json(['message' => 'API funcionando correctamente']);
});

// Autenticación
Route::post('/register', [AuthController::class, 'register']);




