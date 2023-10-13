<?php

namespace LaravelLiberu\Addresses\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelLiberu\Addresses\Models\Region;
use LaravelLiberu\Addresses\Models\Township;

class TownshipFactory extends Factory
{
    protected $model = Township::class;

    public function definition()
    {
        return [
            'region_id' => Region::factory(),
            'name' => $this->faker->word,
        ];
    }
}
