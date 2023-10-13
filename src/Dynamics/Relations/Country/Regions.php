<?php

namespace LaravelLiberu\Addresses\Dynamics\Relations\Country;

use Closure;
use LaravelLiberu\Addresses\Models\Region;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Regions implements Method
{
    public function name(): string
    {
        return 'regions';
    }

    public function closure(): Closure
    {
        return fn () => $this->hasMany(Region::class);
    }
}
