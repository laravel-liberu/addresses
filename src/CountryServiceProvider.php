<?php

namespace LaravelLiberu\Addresses;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Addresses\Dynamics\Relations\Country\Localities;
use LaravelLiberu\Addresses\Dynamics\Relations\Country\Regions;
use LaravelLiberu\Countries\Models\Country;
use LaravelLiberu\DynamicMethods\Services\Methods;

class CountryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Methods::bind(Country::class, [Regions::class, Localities::class]);
    }
}
