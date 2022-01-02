<?php

namespace MostafaKamel\AdvertiseringSystem;

use Illuminate\Console\Scheduling\Schedule;
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
        $this->loadViewsFrom(__DIR__.'/resources', 'advertisering-system');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \MostafaKamel\AdvertiseringSystem\Console\Commands\ReminderCommand::class,
            ]);

            $this->app->booted(function () {
                $schedule = $this->app->make(Schedule::class);
                $schedule->command('reminder daily')->everyMinute();
            });
        }
    }
}
