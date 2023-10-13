<?php

namespace LaravelLiberu\Addresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Helpers\Contracts\Activatable;
use LaravelLiberu\Helpers\Traits\ActiveState;
use LaravelLiberu\Rememberable\Traits\Rememberable;

class Locality extends Model implements Activatable
{
    use ActiveState, HasFactory, Rememberable;

    protected $guarded = [];

    protected $casts = ['is_active' => 'boolean'];

    protected $rememberableKeys = ['id', 'name'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }
}
