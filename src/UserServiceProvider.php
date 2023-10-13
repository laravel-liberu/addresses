<?php

namespace LaravelLiberu\Addresses;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Addresses\Dynamics\Relations\User\Addresses;
use LaravelLiberu\DynamicMethods\Services\Methods;
use LaravelLiberu\Users\Models\User;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Methods::bind(User::class, Addresses::class);
    }
}
