<?php

namespace Laravel\Nova\PennantTool;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Laravel\Pennant\Feature;

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
            Nova::script('nova-pennant-tool', __DIR__.'/../dist/js/tool.js');
            Nova::style('nova-pennant-tool', __DIR__.'/../dist/css/tool.css');
        });
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
                $router->get('/nova-vendor/user-pennant-features', function (Request $request) {
                    return Feature::for(Nova::user($request))->all();
                });
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
