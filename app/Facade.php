<?php

namespace App;

use App\Services\Geolocation\Geolocation;
use App\Services\Geolocation\GeolocationFacade;

class Facade
{
    public function __construct(Geolocation $geolocation)
    {
        //
        $result = GeolocationFacade::search('a');
        dump($result);
    }
}
