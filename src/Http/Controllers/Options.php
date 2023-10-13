<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Http\Resources\OneLiner;
use LaravelLiberu\Addresses\Models\Address;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $resource = OneLiner::class;

    protected $queryAttributes = [
        'street', 'additional', 'locality.name', 'region.name',
        'region.abbreviation',
    ];

    public function query()
    {
        return Address::with('region', 'locality')->ordered();
    }
}
