<?php

namespace Workbench\App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;
use Workbench\App\Features\PurchaseButton;

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
        Feature::define(PurchaseButton::class);

        Feature::define('beta-users', fn (User $user) => ! in_array($user->email, [
            'nova@laravel.com',
        ]));

        Feature::define('new-api', fn (User $user) => in_array($user->email, [
            'nova@laravel.com',
        ]));

        ray(Feature::name('purchase-button'));
    }
}
