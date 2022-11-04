<?php


namespace Gai871013\IpLocation\Facades;

use Illuminate\Support\Facades\Facade;

class IpLocation extends Facade
{
    /**
     * IpLacation 门面
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'IpLocation';
    }
}