<?php

namespace Dcblogdev\Tags;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class TagsServiceProvider extends ServiceProvider
{
    public function boot(Router $router): void
    {
        $this->registerCommands();
        $this->registerMiddleware($router);
        $this->configurePublishing();
    }

    public function registerMiddleware(Router $router): void
    {
        //$router->aliasMiddleware('TagsAuthenticated', TagsAuthenticated::class);
    }

    public function registerCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            // TagsImportCommand::class,
        ]);
    }

    public function configurePublishing(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/tags.php' => config_path('tags.php'),
        ], 'config');

        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
            __DIR__.'/database/migrations/create_tags_table.php' => $this->app->databasePath()."/migrations/{$timestamp}_create_tags_table.php",
        ], 'migrations');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tags.php', 'tags');

        // Register the service the package provides.
        $this->app->singleton('tags', function () {
            return new Tags;
        });
    }

    public function provides(): array
    {
        return ['tags'];
    }
}
