<?php

namespace LaravelLiberu\Addresses\Http\Requests;

use Illuminate\Contracts\Validation\Rule;

class Longitude implements Rule
{
    private const Pattern = "/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/";

    public function passes($attribute, $value)
    {
        return preg_match(self::Pattern, $value);
    }

    public function message()
    {
        return __('The :attribute must be a valid coordinate');
    }
}
