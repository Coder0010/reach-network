<?php

namespace MostafaKamel\AdvertiseringSystem;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('MostafaKamel\AdvertiseringSystem\Http\Controllers\AdController');
        // $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/database/factories');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadFactoriesFrom(__DIR__.'/database/factories');
    }
}
