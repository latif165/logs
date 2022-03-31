<?php

namespace Ds\Logs;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Ds\Logs\Http\Middleware\RequestLog;

class LogsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishMigrations();
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('api', RequestLog::class);
    }

    private function publishMigrations()
    {
        $path = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'logs-migrations');
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/../database/migrations/';
    }
}
