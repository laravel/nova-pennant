<?php

namespace Workbench\App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Feature::define('purchase-button', fn () => Arr::random([
            'blue-sapphire',
            'seafoam-green',
            'tart-orange',
        ]));

        Feature::define('beta-users', fn (User $user) => ! in_array($user->email, [
            'nova@laravel.com',
        ]));

        Feature::define('new-api', fn (User $user) => in_array($user->email, [
            'nova@laravel.com',
        ]));
    }
}
