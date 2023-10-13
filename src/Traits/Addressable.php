<?php

namespace LaravelLiberu\Addresses\Traits;

use Illuminate\Support\Facades\Config;
use LaravelLiberu\Addresses\Models\Address;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

trait Addressable
{
    public static function bootAddressable()
    {
        self::deleting(function ($model) {
            $shouldRestrict = Config::get('liberu.addresses.onDelete') === 'restrict'
                && $model->addresses()->exists();

            if ($shouldRestrict) {
                throw new ConflictHttpException(
                    __('The entity has addresses and cannot be deleted')
                );
            }
        });

        self::deleted(function ($model) {
            if (Config::get('liberu.addresses.onDelete') === 'cascade') {
                $model->addresses()->delete();
            }
        });
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')
            ->whereIsDefault(true);
    }

    public function billingAddress()
    {
        return $this->morphOne(Address::class, 'addressable')
            ->whereIsBilling(true);
    }

    public function shippingAddresses()
    {
        return $this->morphMany(Address::class, 'addressable')
            ->whereIsShipping(true);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
