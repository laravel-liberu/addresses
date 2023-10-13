<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Http\Requests\ValidatePostcode;
use LaravelLiberu\Addresses\Http\Resources\Postcode as Resource;
use LaravelLiberu\Addresses\Models\Postcode as Model;

class Postcode extends Controller
{
    public function __invoke(ValidatePostcode $request)
    {
        $postcode = Model::for(
            $request->get('country_id'),
            $request->get('postcode')
        )->first();

        return [
            'postcode' => new Resource($postcode),
        ];
    }
}
