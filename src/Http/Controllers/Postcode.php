<?php

namespace LaravelEnso\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Addresses\Http\Requests\ValidatePostcode;
use LaravelEnso\Addresses\Http\Resources\Postcode as Resource;
use LaravelEnso\Addresses\Models\Postcode as Model;

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
