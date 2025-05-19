<?php

declare(strict_types=1);

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])
    ->group(callback: function (): void {
        Route::get(uri: 'login', action: [Auth\AuthController::class, 'create'])
            ->name(name: 'login');

        Route::post(uri: 'login', action: [Auth\AuthController::class, 'login'])
            ->middleware(middleware: ['throttle:5,1']);
    });

Route::middleware(['auth'])
    ->group(callback: function (): void {
        Route::post(uri: 'logout', action: [Auth\AuthController::class, 'logout'])
            ->name(name: 'logout');
    });
