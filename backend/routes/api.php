<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CamisetaController;
use App\Http\Controllers\TallaController;

// Health Check
Route::get('/health', [HealthController::class, 'index']);

Route::prefix('v1')->group(function () {

    // Clientes
    Route::apiResource('clientes', ClienteController::class);

    // Camisetas
    Route::apiResource('camisetas', CamisetaController::class);

    // Tallas
    Route::apiResource('tallas', TallaController::class);
});
