<?php

namespace App\Providers;

use App\Features\PurchaseButton;
use App\Features\UserRole;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Relation::morphMap([
            'user' => User::class,
        ]);

        Feature::useMorphMap();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Feature::define(PurchaseButton::class);
        Feature::define(UserRole::class);

        Feature::define('beta-users', fn (User $user) => ! in_array($user->email, [
            'nova@laravel.com',
        ]));

        Feature::define('new-api', fn (User $user) => in_array($user->email, [
            'nova@laravel.com',
        ]));
    }
}
