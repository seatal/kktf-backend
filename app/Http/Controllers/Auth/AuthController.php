<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\Login;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class AuthController
{
    public function create(): \Inertia\Response
    {
        return Inertia::render(component: 'Auth/Login', props: [
            'target' => route(name: 'auth.login'),
        ]);
    }

    public function login(LoginRequest $request, Login $action): Response
    {
        DB::transaction(
            callback: fn () => $action->handle(
                data: $request->dataObject(),
            ),
        );

        $request->session()->regenerate();

        return Inertia::location(
            url: redirect()->intended(
                default: route(name: 'portal.dashboard', absolute: false),
            )->getTargetUrl(),
        );
    }

    public function logout(Request $request): Response
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Inertia::location(
            url: route(name: 'auth.login', absolute: false),
        );
    }
}
