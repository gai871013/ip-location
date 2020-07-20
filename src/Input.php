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


    public function get_client_ip()
    {
        if (isset($_SERVER['HTTP_X_REAL_IP'])) {//nginx 代理模式下，获取客户端真实IP
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {//客户端的ip
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {//浏览当前页面的用户计算机的网关
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown', $arr);
            if (false !== $pos) unset($arr[$pos]);
            $ip = trim($arr[0]);
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
        } else {
            $ip = null;
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim(current($ip));
        }
        return $ip;
    }
}