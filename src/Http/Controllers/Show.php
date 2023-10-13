<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Http\Resources\Address as Resource;
use LaravelLiberu\Addresses\Models\Address;

class Show extends Controller
{
    public function __invoke(Address $address)
    {
        return new Resource($address->load('country', 'region', 'locality'));
    }
}
