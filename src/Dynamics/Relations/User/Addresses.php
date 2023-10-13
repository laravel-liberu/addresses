<?php

namespace LaravelLiberu\Addresses\Dynamics\Relations\User;

use Closure;
use LaravelLiberu\Addresses\Models\Address;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Addresses implements Method
{
    public function name(): string
    {
        return 'addresses';
    }

    public function closure(): Closure
    {
        return fn () => $this->hasMany(Address::class, 'created_by');
    }
}
