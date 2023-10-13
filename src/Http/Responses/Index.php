<?php

namespace LaravelLiberu\Addresses\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelLiberu\Addresses\Http\Resources\Address as Resource;
use LaravelLiberu\Addresses\Models\Address;

class Index implements Responsable
{
    public function toResponse($request)
    {
        return Resource::collection(
            Address::with('country', 'region', 'locality')
                ->for($request->get('addressable_id'), $request->get('addressable_type'))
                ->ordered()
                ->get()
        );
    }
}
