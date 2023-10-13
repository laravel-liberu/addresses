<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Models\Address;

class MakeDefault extends Controller
{
    public function __invoke(Address $address)
    {
        if (! $address->isDefault()) {
            $address->makeDefault();
        }
    }
}
