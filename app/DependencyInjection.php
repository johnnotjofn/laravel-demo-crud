<?php

namespace App;

use App\Services\Geolocation\Geolocation;

class DependencyInjection
{
    /**
     * @param Geolocation $geolocation
     */
    public function __construct(Geolocation $geolocation)
    {
        return $geolocation->search('a');
    }
}
