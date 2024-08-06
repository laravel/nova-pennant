<?php

namespace Laravel\Nova\PennantTool;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Laravel\Nova\PennantTool\Http\Controllers\FeaturesController;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::remoteScript(mix('tool.js', 'vendor/nova-pennant-tool'));
        });

        $this->publishes([
            __DIR__.'/../dist' => public_path('vendor/nova-pennant-tool'),
        ], ['nova-assets', 'laravel-assets']);
    }

    /**
     * Register the tool's routes.
     */
    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(config('nova.api_middleware', []))
            ->group(function (Router $router) {
                $router->get('/nova-vendor/user-pennant-features', FeaturesController::class);
            });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
