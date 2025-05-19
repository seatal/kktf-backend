<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    /** @return array<string, mixed> */
    public function share(Request $request): array
    {
        return collect(
            value: parent::share(request: $request),
        )->put(
            key: 'session',
            value: fn () => collect(value: $request->session()->all())->reject(
                callback: fn (mixed $value, string $key) => str(string: $key)->startsWith(needles: '_'),
            )->all(),
        )->when(
            value: $request->user(),
            callback: function (Collection $sharable, User $auth): void {
                $sharable
                    ->put(key: 'routes', value: $this->portalRoutes());
            },
            default: function (Collection $sharable): void {
                $sharable->put(key: 'routes', value: $this->guestRoutes());
            },
        )->toArray();
    }

    /** @return Collection<string, string> */
    private function portalRoutes(): Collection
    {
        return collect(value: [
            'logout' => route(name: 'auth.logout', absolute: false),
        ]);
    }

    /** @return Collection<string, string> */
    private function guestRoutes(): Collection
    {
        return collect(value: [
            'login' => route(name: 'auth.login', absolute: false),
        ]);
    }
}
