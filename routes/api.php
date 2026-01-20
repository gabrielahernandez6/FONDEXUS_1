<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);

Route::middleware(['web', 'auth'])->prefix('dashboard')->group(function (): void {
    Route::get('summary', [DashboardController::class, 'summary']);
    Route::get('recent-changes', [DashboardController::class, 'recentChanges']);
    Route::get('stats', [DashboardController::class, 'stats']);
});
