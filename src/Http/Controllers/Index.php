<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Http\Requests\ValidateAddressFetch;
use LaravelLiberu\Addresses\Http\Responses\Index as Response;

class Index extends Controller
{
    public function __invoke(ValidateAddressFetch $request)
    {
        return new Response();
    }
}
