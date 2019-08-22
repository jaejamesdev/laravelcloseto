<?php

namespace JaeJamesDev\LaravelCloseTo;

use Illuminate\Support\ServiceProvider;

class LaravelCloseToServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        (new CloseTo)->apply();
    }
}
