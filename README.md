<h1 align="center"> ip-location </h1>

<p align="center"> 纯真IP库.</p>


## 安装

```shell
$ composer require gai871013/ip-location -vvv
```

## Usage

```php
use Gai871013\IpLocation\IpLocation;


$shortUrl = new ShortUrl($config);

// 长链接 -> 短链接
$long_url = 'https://www.achais.com';
$result = $shortUrl->shorten($long_url);
print_r($result);

// 短链接 -> 长链接
$short_url = 'https://dwz.cn/ZzVmHQZa';
$result = $shortUrl->expand($short_url);
var_dump($result);
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/gai871013/ip-location/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/gai871013/ip-location/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT