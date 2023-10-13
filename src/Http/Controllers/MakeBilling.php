<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Models\Address;

class MakeBilling extends Controller
{
    public function __invoke(Address $address)
    {
        $address->toggleBilling();
    }
}
