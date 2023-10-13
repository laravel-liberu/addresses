<?php

namespace LaravelLiberu\Addresses\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use LaravelLiberu\Addresses\Models\Postcode;
use LaravelLiberu\Countries\Models\Country;
use LaravelLiberu\Helpers\Services\JsonReader;
use LaravelLiberu\Helpers\Traits\SeederProgress;
use Symfony\Component\Finder\SplFileInfo;

class PostcodeSeeder extends Seeder
{
    use SeederProgress;

    private const Chunk = 100;
    private Collection $countries;

    public function run()
    {
        $this->init()
            ->importPostCodes()
            ->end();
    }

    private function init(): self
    {
        $this->countries = $this->countries()
            ->mapWithKeys(fn (Country $country) => [$country->id => $this->postcodes($country)]);

        $this->chunk(self::Chunk)->start(
            $this->countries->sum->count()
        );

        return $this;
    }

    private function importPostCodes(): self
    {
        $this->countries
            ->each(fn ($postcodes, $countryId) => $postcodes
                ->map(fn ($township) => Collection::wrap($township)
                    ->mapWithKeys(fn ($value, $key) => [Str::snake($key) => $value])
                    ->put('country_id', $countryId)
                    ->put('created_at', Carbon::now())
                    ->put('updated_at', Carbon::now())
                    ->toArray())
                ->chunk(static::Chunk)
                ->each(function ($townships) {
                    Postcode::insert($townships->toArray());
                    $this->advance();
                }));

        return $this;
    }

    private function postcodes(Country $country): Collection
    {
        return (new JsonReader($this->path(["{$country->iso_3166_3}.json"])))
            ->collection()
            ->mapWithKeys(fn ($postcode) => [$postcode['code'] => $postcode])
            ->values();
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
            base_path('vendor/laravel-enso/addresses/database/postcodes'), ...$path,
        ])->implode(DIRECTORY_SEPARATOR);
    }
}
