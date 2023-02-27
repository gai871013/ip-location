<h1 align="center"> ip-location 纯真IP地址库，ipip </h1>
<p align="center"> 纯真IP地址库,composer包(解析QQWry.dat).</p>
<p align="center">记录总数：530586条
更新日期：2023年02月22日</p>

## 安装

```shell
$ composer require gai871013/ip-location -vvv
```

## 使用方式
### 在Laravel中使用
1.在 `config/app.php` 注册 ServiceProvider 和 Facade (Laravel 5.5 + 无需手动注册)
```php
<?php
['providers' => [
    // ...
    Gai871013\IpLocation\ServiceProvider::class,
],
'aliases' => [
    // ...
    'IpLocation' => Gai871013\IpLocation\Facades\IpLocation::class,
],
];
```
2.使用：

```php
<?php
use Gai871013\IpLocation\Facades\IpLocation;

    // ...
    dump(app('IpLocation')->getLocation('www.wc87.com'));
    dd(IpLocation::getLocation('8.8.4.4'));
    array(
      "ip" => "101.200.45.167",
      "beginip" => "101.200.0.0",
      "endip" => "101.201.255.255",
      "country" => "北京市",
      "area" => "阿里云BGP数据中心",
    );

    array(
      "ip" => "8.8.4.4",
      "beginip" => "8.8.4.4",
      "endip" => "8.8.4.4",
      "country" => "美国",
      "area" => "加利福尼亚州圣克拉拉县山景市谷歌公司DNS服务器",
    );
    // ...

```
### 基本使用
```php
<?php
use Gai871013\IpLocation\IpLocation;

$ipLocation = new IpLocation();

// url
$url = 'https://www.baidu.com';
$ip = '127.0.0.1';
// 使用域名国家&运营商
$result = $ipLocation->getLocation($url);
dump($result);

array(
  "ip" => "61.135.169.125",
  "beginip" => "61.135.169.0",
  "endip" => "61.135.169.255",
  "country" => "北京市",
  "area" => "北京百度网讯科技有限公司联通节点",
);

// 使用IP地址国家&运营商
$result = $ipLocation->getLocation($ip);
dump($result);

array(
  "ip" => "127.0.0.1",
  "beginip" => "127.0.0.1",
  "endip" => "127.0.0.1",
  "country" => "本机地址",
  "area" => "",
)
?>
```

```php
<?php
# ipip
$path = 'path-to-ipdb.ipdb' || null;

$city = new Gai871013\IpLocation\ipip\db\City($path);
var_dump($city->find('118.28.1.1'));
var_dump($city->find('8.8.8.8'));
var_dump($city->find('127.0.0.1'));
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/gai871013/ip-location/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/gai871013/ip-location/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT

## Sponsors
[![JetBrains](./jetbrains.svg )](https://www.jetbrains.com/?from=ip-location)
