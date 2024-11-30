<?php

namespace VendorName\MyPackage;

use Illuminate\Support\ServiceProvider;

class IdealServiceProvider extends ServiceProvider
{
    /**
     * Bootstraps the application services.
     */
    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mypackage');

        // Config
        $this->publishes([
            __DIR__.'/../config/mypackage.php' => config_path('mypackage.php'),
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Merge Config
        $this->mergeConfigFrom(
            __DIR__.'/../config/mypackage.php',
            'mypackage'
        );
    }
}
