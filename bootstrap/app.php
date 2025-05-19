<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(path: __DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web/index.php',
        health: '/up',
    )
    ->withMiddleware(callback: function (Middleware $middleware): void {
        $middleware
            ->redirectTo(guests: '/auth/login')
            ->web(append: [
                HandleInertiaRequests::class,
            ]);
    })
    ->withExceptions(using: function (Exceptions $exceptions): void {})
    ->create();
