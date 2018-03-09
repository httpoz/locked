<?php

namespace HttpOz\Locked;

use Illuminate\Support\ServiceProvider;

class LockedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/locked.php' => config_path('locked.php')
            ],
            'config'
        );
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'httpoz');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/locked.php', 'locked');
    }
}
