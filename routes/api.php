<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Juridica\LeyVigenteController;
use App\Http\Controllers\Api\Juridica\ProcesoJuridicoController;
use App\Http\Controllers\Api\Juridica\PublicacionSecopController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);

Route::middleware(['web', 'auth'])->prefix('dashboard')->group(function (): void {
    Route::get('summary', [DashboardController::class, 'summary']);
    Route::get('recent-changes', [DashboardController::class, 'recentChanges']);
    Route::get('stats', [DashboardController::class, 'stats']);
});

Route::middleware(['web', 'auth'])->prefix('juridica')->group(function (): void {
    Route::post('procesos/{proceso_juridico}/documento', [ProcesoJuridicoController::class, 'uploadDocumento']);
    Route::get('procesos/{proceso_juridico}/documento/signed-url', [ProcesoJuridicoController::class, 'documentoSignedUrl']);
    Route::delete('procesos/{proceso_juridico}/documento', [ProcesoJuridicoController::class, 'deleteDocumento']);

    Route::apiResource('procesos', ProcesoJuridicoController::class)->parameters([
        'procesos' => 'proceso_juridico',
    ]);

    Route::apiResource('publicaciones-secop', PublicacionSecopController::class)->parameters([
        'publicaciones-secop' => 'publicacion_secop',
    ]);

    Route::apiResource('leyes-vigentes', LeyVigenteController::class)->parameters([
        'leyes-vigentes' => 'ley_vigente',
    ]);
});
