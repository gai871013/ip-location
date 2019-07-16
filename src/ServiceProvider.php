<?php

namespace Gai871013\IpLocation;

use Illuminate\Support\Arr;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IpLocation::class, function () {
            return new IpLocation();
        });

        $this->app->alias(IpLocation::class, 'ipLocation');
    }


    public function provides()
    {
        return [IpLocation::class, 'ipLocation'];
    }
}
