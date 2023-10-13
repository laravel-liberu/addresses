<?php

namespace LaravelLiberu\Addresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Countries\Models\Country;
use LaravelLiberu\Helpers\Contracts\Activatable;
use LaravelLiberu\Helpers\Traits\ActiveState;
use LaravelLiberu\Rememberable\Traits\Rememberable;

class Region extends Model implements Activatable
{
    use ActiveState, HasFactory, Rememberable;

    protected $guarded = [];

    protected $rememberableKeys = ['id', 'name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function localities()
    {
        return $this->hasMany(Locality::class);
    }
}
