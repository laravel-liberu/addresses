<?php

namespace LaravelLiberu\Addresses\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use LaravelLiberu\Addresses\Models\Township;
use LaravelLiberu\Countries\Models\Country;
use LaravelLiberu\Helpers\Services\JsonReader;
use Symfony\Component\Finder\SplFileInfo;

class TownshipSeeder extends Seeder
{
    public function run()
    {
        $this->countries()
            ->each(fn (Country $country) => $this->importTownships($country));
    }

    private function importTownships(Country $country)
    {
        $this->townships($country)
            ->map(fn ($township) => Collection::wrap($township)
                ->mapWithKeys(fn ($value, $key) => [Str::snake($key) => $value])
                ->put('created_at', Carbon::now())
                ->put('updated_at', Carbon::now())
                ->toArray())
            ->chunk(250)
            ->each(fn ($townships) => Township::insert($townships->toArray()));
    }

    private function townships(Country $country): Collection
    {
        return (new JsonReader($this->path(["{$country->iso_3166_3}.json"])))
            ->collection()
            ->unique(fn ($township) => $township['id']);
    }

    private function countries(): Collection
    {
        return Collection::wrap(File::files($this->path()))
            ->map(fn (SplFileInfo $file) => Country::where('iso_3166_3', $file->getBasename('.json'))->first())
            ->filter();
    }

    private function path(array $path = []): string
    {
        return Collection::wrap([
            base_path('vendor/laravel-liberu/addresses/database/townships'), ...$path,
        ])->implode(DIRECTORY_SEPARATOR);
    }
}
