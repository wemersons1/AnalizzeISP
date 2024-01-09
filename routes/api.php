<?php

use App\Http\Controllers\MeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::post('/sessions', [SessionController::class, 'store']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::prefix('me')->group(function() {
            Route::get('/', [MeController::class, 'show']);
            Route::put('/', [MeController::class, 'update']);
        });
        Route::apiResource('users', UserController::class);
        Route::apiResource('endereco', AddressController::class);
    });
});
