<?php

namespace LaravelLiberu\Addresses\Dynamics\Relations\Country;

use Closure;
use LaravelLiberu\Addresses\Models\Locality;
use LaravelLiberu\Addresses\Models\Region;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Localities implements Method
{
    public function name(): string
    {
        return 'localities';
    }

    public function closure(): Closure
    {
        return fn () => $this->hasManyThrough(Locality::class, Region::class);
    }
}
