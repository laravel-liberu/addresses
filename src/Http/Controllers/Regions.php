<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelLiberu\Addresses\Models\Region;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Regions extends Controller
{
    use OptionsBuilder;

    protected $queryAttributes = ['name', 'abbreviation'];

    public function query()
    {
        return Region::active();
    }
}
