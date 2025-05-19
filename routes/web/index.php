<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::redirect(uri: '', destination: '/auth/login');

Route::name('auth.')
    ->prefix('auth')
    ->group(callback: base_path(path: 'routes/web/auth.php'));
