<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelLiberu\Addresses\Http\Resources\Locality as Resource;
use LaravelLiberu\Addresses\Models\Locality;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Localities extends Controller
{
    use OptionsBuilder;

    protected $queryAttributes = ['name', 'township_id'];
    protected $resource = Resource::class;

    public function query()
    {
        return Locality::with('township')
            ->active();
    }
}
