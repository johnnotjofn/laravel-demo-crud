<?php

namespace App\Services\Geolocation;

use App\Services\Map\Map;
use App\Services\Satellite\Satellite;

class Geolocation
{
    /**
     * @var Map
     */
    private $map;
    /**
     * @var Satellite
     */
    private $satellite;

    public function __construct(Map $map, Satellite $satellite)
    {

        $this->map = $map;
        $this->satellite = $satellite;
    }

    /**
     * @param string $name
     * @return int[]
     */
    public function search(string $name):array
    {
        // ...
        $locationInfo = $this->map->findAddress($name);

        return $this->satellite->pinpoint($locationInfo);
    }
}
