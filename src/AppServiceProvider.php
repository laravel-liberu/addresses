<?php

namespace LaravelLiberu\Addresses;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()
            ->publish();
    }

    private function load()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/addresses.php', 'liberu.addresses');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], ['addresses-factory', 'liberu-factories']);

        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders'),
        ], ['addresses-seeder', 'liberu-seeders']);

        $this->publishes([
            __DIR__.'/../config' => config_path('liberu'),
        ], ['addresses-config', 'liberu-config']);
    }
}
