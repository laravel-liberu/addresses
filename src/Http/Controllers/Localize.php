<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Models\Address;

class Localize extends Controller
{
    public function __invoke(Address $address)
    {
        return $address->localize();
    }
}
