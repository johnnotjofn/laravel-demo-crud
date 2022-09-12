<?php

namespace App\Providers;

use App\Services\Geolocation\Geolocation;
use App\Services\Map\Map;
use App\Services\Satellite\Satellite;
use Illuminate\Support\ServiceProvider;

class GeolocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
        /** Definition of class binding
         *
         */
        $this->app->bind(Geolocation::class, function ($app) {
            // Write Geolocation service
            $map = new Map();
            $satellite = new Satellite();

            return new Geolocation($map, $satellite);
        });
    }

    /**
     * Bootstrap services.
     * Called after all Services are registered.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
