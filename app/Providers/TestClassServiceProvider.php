<?php

namespace App\Providers;

use App\Services\TestClass\TestClass;
use Illuminate\Support\ServiceProvider;

class TestClassServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('test1',TestClass::class);
        $this->app->bind('test2',TestClass::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
