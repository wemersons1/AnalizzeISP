<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\CompanyAddressController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::get('/states', [RegionController::class, 'states']);
    Route::get('/cities', [RegionController::class, 'cities']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::prefix('me')->group(function() {
            Route::get('/', [MeController::class, 'show']);
            Route::put('/', [MeController::class, 'update']);
        });
        Route::apiResource('users', UserController::class);
        Route::get('clients', [ClientController::class, 'index']);
        Route::apiResource('users-address', UserAddressController::class);
        Route::apiResource('companies', CompanyController::class);
        Route::apiResource('companies-address', CompanyAddressController::class);
    });
});
