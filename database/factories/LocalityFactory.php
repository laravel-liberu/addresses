<?php

namespace LaravelLiberu\Addresses\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelLiberu\Addresses\Models\Locality;
use LaravelLiberu\Addresses\Models\Region;
use LaravelLiberu\Addresses\Models\Township;

class LocalityFactory extends Factory
{
    protected $model = Locality::class;

    public function definition()
    {
        return [
            'region_id' => Region::factory(),
            'township_id' => Township::factory(),
            'name' => $this->faker->word,
            'is_active' => $this->faker->boolean,
        ];
    }
}
