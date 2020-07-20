<?php


namespace Gai871013\IpLocation;


use Gai871013\IpLocation\Exceptions\InvalidArgumentException;

trait Input
{

    /**
     * @param string $ip
     * @return string|null
     * @throws InvalidArgumentException
     */
    private function getIp($ip = '')
    {
        if (empty($ip)) {
            $ip = $this->get_client_ip();
        }
        if (preg_match('/^(http|https|ftp):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\’:+!]*([^<>\”])*$/', $ip)) {
            $parse = parse_url($ip);
            if (isset($parse['host'])) {
                $ip = gethostbyname($parse['host']);
            }
        } elseif ($ip != $getHostByName = gethostbyname($ip)) {
            $ip = $getHostByName;
        }

        if (!preg_match('/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/', $ip)) {
            throw new InvalidArgumentException('无效的参数：' . $ip . '!');
        }

        return $ip;
    }
}