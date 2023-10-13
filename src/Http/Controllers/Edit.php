<?php

namespace LaravelLiberu\Addresses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelLiberu\Addresses\Forms\Builders\Address as Form;
use LaravelLiberu\Addresses\Models\Address;

class Edit extends Controller
{
    public function __invoke(Request $request, Address $address, Form $form)
    {
        return ['form' => $form->edit($address, $request->get('countryId'))];
    }
}
