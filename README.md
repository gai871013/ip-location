<h1 align="center"> ip-location </h1>

<p align="center"> 纯真IP库(更新至2019-07-20).</p>


## 安装

```shell
$ composer require gai871013/ip-location -vvv
```

## Usage

```php
use Gai871013\IpLocation\IpLocation;

$ipLocation = new IpLocation();

// url
$url = 'https://www.baidu.com';
$ip = '127.0.0.1';
// 使用域名国家&运营商
$result = $ipLocation->getLocation($url);
dump($result);

array:5 [▼
  "ip" => "61.135.169.125"
  "beginip" => "61.135.169.0"
  "endip" => "61.135.169.255"
  "country" => "北京市"
  "area" => "北京百度网讯科技有限公司联通节点"
]

// 使用IP地址国家&运营商
$result = $ipLocation->getLocation($ip);
dump($result);

array:5 [▼
  "ip" => "127.0.0.1"
  "beginip" => "127.0.0.1"
  "endip" => "127.0.0.1"
  "country" => "本机地址"
  "area" => ""
]
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/gai871013/ip-location/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/gai871013/ip-location/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT