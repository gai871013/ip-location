<?php


namespace Gai871013\IpLocation\Facades;
use Illuminate\Support\Facades\Facade;

class IpLocation extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'IpLocation';
    }
}