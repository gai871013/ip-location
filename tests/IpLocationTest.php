<?php


namespace Gai871013\IpLocation\Tests;

use Gai871013\IpLocation\Exceptions\Exception;
use Gai871013\IpLocation\Exceptions\InvalidArgumentException;
use Gai871013\IpLocation\IpLocation;
use PHPUnit\Framework\TestCase;

class IpLocationTest extends TestCase
{

    /**
     * @throws InvalidArgumentException
     */
    public function testGetLocationWithInvalid()
    {
        $il = new IpLocation();
        $r = $il->getLocation('1.1.1.1');
        $r = $il->getLocation('https://www.baidu.com');
        $r = $il->get_client_ip();
    }
}