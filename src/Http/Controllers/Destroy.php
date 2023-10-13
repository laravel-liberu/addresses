<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Exceptions\Address as Exception;
use LaravelLiberu\Addresses\Models\Address;

class Destroy extends Controller
{
    public function __invoke(Address $address)
    {
        if ($address->isDefault() && $address->isNotSingle()) {
            throw Exception::cannotRemoveDefault();
        }

        $address->delete();

        return ['message' => __('The address was deleted')];
    }
}
