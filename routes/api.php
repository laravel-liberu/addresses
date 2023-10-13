<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Addresses\Http\Controllers\Create;
use LaravelLiberu\Addresses\Http\Controllers\Destroy;
use LaravelLiberu\Addresses\Http\Controllers\Edit;
use LaravelLiberu\Addresses\Http\Controllers\Index;
use LaravelLiberu\Addresses\Http\Controllers\Localities;
use LaravelLiberu\Addresses\Http\Controllers\Localize;
use LaravelLiberu\Addresses\Http\Controllers\MakeBilling;
use LaravelLiberu\Addresses\Http\Controllers\MakeDefault;
use LaravelLiberu\Addresses\Http\Controllers\MakeShipping;
use LaravelLiberu\Addresses\Http\Controllers\Options;
use LaravelLiberu\Addresses\Http\Controllers\Postcode;
use LaravelLiberu\Addresses\Http\Controllers\Regions;
use LaravelLiberu\Addresses\Http\Controllers\Show;
use LaravelLiberu\Addresses\Http\Controllers\Store;
use LaravelLiberu\Addresses\Http\Controllers\Update;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/core/addresses')->as('core.addresses.')
    ->group(function () {
        Route::get('localities', Localities::class)->name('localities');
        Route::get('regions', Regions::class)->name('regions');
        Route::get('', Index::class)->name('index');
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('options', Options::class)->name('options');
        Route::get('postcode', Postcode::class)->name('postcode');
        Route::get('{address}/edit', Edit::class)->name('edit');
        Route::get('{address}/localize', Localize::class)->name('localize');
        Route::patch('{address}', Update::class)->name('update');
        Route::delete('{address}', Destroy::class)->name('destroy');

        Route::patch('makeDefault/{address}', MakeDefault::class)->name('makeDefault');
        Route::patch('makeBilling/{address}', MakeBilling::class)->name('makeBilling');
        Route::patch('makeShipping/{address}', MakeShipping::class)->name('makeShipping');

        Route::get('{address}', Show::class)->name('show');
    });
