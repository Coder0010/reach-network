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
        // \Illuminate\Database\Eloquent\Factories\Factory::guessFactoryNamesUsing(function (string $modelName) {
        //     return '\MostafaKamel\AdvertiseringSystem\Database\\Factories\\' . \Arr::last(explode('\\', $modelName)) . 'Factory';
        // });
        
    }
}
