<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MakulController;

use L5Swagger\Http\Middleware\DocsMiddleware;

Route::middleware([DocsMiddleware::class])->group(function () {
    Route::get('/api/documentation', '\L5Swagger\Http\Controllers\SwaggerController@api');
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('dosens', DosenController::class);
    Route::apiResource('mahasiswas', MahasiswaController::class);
    Route::apiResource('makuls', MakulController::class);

    Route::get('makul/{kode_makul}/dosens', [MakulController::class, 'getDosensByMakul']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::post('/dosen', [DosenController::class, 'store']);
    Route::get('/dosen/{id}', [DosenController::class, 'show']);
    Route::put('/dosen/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/makul', [MakulController::class, 'index']);
    Route::post('/makul', [MakulController::class, 'store']);
    Route::get('/makul/{id}', [MakulController::class, 'show']);
    Route::put('/makul/{id}', [MakulController::class, 'update']);
    Route::delete('/makul/{id}', [MakulController::class, 'destroy']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');