<?php

namespace App\Services\Geolocation;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array search(string $string)
 * @see Geolocation
 */
class GeolocationFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Geolocation::class;
    }
}
