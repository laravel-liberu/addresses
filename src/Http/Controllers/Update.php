<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Http\Requests\ValidateAddressRequest;
use LaravelLiberu\Addresses\Models\Address;

class Update extends Controller
{
    public function __invoke(ValidateAddressRequest $request, Address $address)
    {
        $address->fill($request->validated())->store();

        return ['message' => __('The address has been successfully updated')];
    }
}
