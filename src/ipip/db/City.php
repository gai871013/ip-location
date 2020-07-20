<?php

/**
 * @site https://www.ipip.net
 * @desc Parse IP library in ipdb format
 * @copyright IPIP.net
 */

namespace Gai871013\IpLocation\ipip\db;

use Gai871013\IpLocation\Exceptions\InvalidArgumentException;
use Gai871013\IpLocation\Input;

class City
{
    use Input;

    public $reader = NULL;

    public function __construct($db = null)
    {
        if (is_null($db)) {
            $db = __DIR__ . '/../../ipipfree.ipdb';
        }
        $this->reader = new Reader($db);
    }

    public function find($ip = '', $language = 'CN')
    {
        try {
            $ip = $this->getIp($ip);
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException('无效的参数：' . $ip . '!');
        }

        $return = [
            'ip'      => $ip,
            'beginip' => $ip,
            'endip'   => $ip,
            'country' => '',
            'area'    => '',
        ];
        $res    = $this->reader->find($ip, $language);
        $return['country'] .= implode('', $res);
        return $return;
    }
}