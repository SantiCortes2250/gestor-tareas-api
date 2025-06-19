<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

// CSRF cookie (para Sanctum)
Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

// API base
Route::get('/', function () {
    return response()->json(['message' => 'API funcionando correctamente']);
});

// Autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/check', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'cookies' => $request->cookies->all(), // Ver todas las cookies recibidas
        'session_id' => $request->cookie('laravel_session'),
        'user' => auth()->user()
    ]);
});

// Usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['web'])->get('/test-session', function () {
    session(['test' => 'ok']);
    return session('test');
});
