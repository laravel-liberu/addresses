<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Exceptions\Address as Exception;
use LaravelLiberu\Addresses\Http\Requests\ValidateAddressRequest;
use LaravelLiberu\Addresses\Models\Address;

class Store extends Controller
{
    public function __invoke(ValidateAddressRequest $request, Address $address)
    {
        $address->fill($request->validated());

        if ($address->shouldBeSingle()) {
            throw Exception::cannotHaveMultiple();
        }

        $address->store();

        return [
            'message' => __('The address was successfully created'),
            'address_id' => $address->id,
        ];
    }
}
