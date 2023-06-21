Yii 2 GeoIP extension
=====================

[![Latest Stable Version](https://poser.pugx.org/coderius/yii2-geo-ip/v/stable)](https://packagist.org/packages/coderius/yii2-geo-ip)
[![Total Downloads](https://poser.pugx.org/coderius/yii2-geo-ip/downloads)](https://packagist.org/packages/coderius/yii2-geo-ip)
[![Latest Unstable Version](https://poser.pugx.org/coderius/yii2-geo-ip/v/unstable)](https://packagist.org/packages/coderius/yii2-geo-ip)
[![License](https://poser.pugx.org/coderius/yii2-geo-ip/license)](https://packagist.org/packages/coderius/yii2-geo-ip)
[![Monthly Downloads](https://poser.pugx.org/coderius/yii2-geo-ip/d/monthly)](https://packagist.org/packages/coderius/yii2-geo-ip)


This extension allows you to get geo data by ip address.

Currently available:

* All fields of the database Maxmind


## Install

Run

```bash
$ php composer.phar require coderius/yii2-geo-ip "~1.0"
```
Or equal
```bash
$ composer require coderius/yii2-geo-ip "~1.0"
```

#### OR 

add to your `composer.json`

```json
{
    "require": {
        "coderius/yii2-geo-ip": "~1.0.3"
    }
}
```

and run

```bash
$ php composer update
```


## Usage

###  Component registration in app config 

```php
<?php

$config = [
    ...
    'components' => [
        'geoip' => ['class' => 'coderius\geoIp\GeoIP'],
    ]
    ...
];
```

somewhere in code

```php

$ip = Yii::$app->geoip->ip(); // current user ip
$ip = Yii::$app->geoip->ip(null, false);// current user ip without catche

$ip = Yii::$app->geoip->ip("208.113.83.165");
```


```php

$ip = Yii::$app->geoip->ip("208.113.83.165")//or Yii::$app->geoip->ip() for current user


$ip->city; // "San Francisco"
$ip->country; // "United States"
$ip->location->lng; // 37.7898
$ip->location->lat; // -122.3942
$ip->isoCode;

//etc.
```

### Provide a custom database (for example, if you own a licence)

```php
<?php

$config = [
    ...
    'components' => [
        'geoip' => [
            'class' => 'coderius\geoIp\GeoIP',
            'dbPath' => Yii::getAlias('@example/maxmind/database/city.mmdb')
        ],
    ]
    ...
];
```

### Advanced usage


```

To see all the available properties, you need to do the following:

```php
var_dump($ip->city);
var_dump($ip->continent);
var_dump($ip->country);
var_dump($ip->location);
var_dump($ip->postal);
var_dump($ip->registeredCountry);
var_dump($ip->subdivisions);
die;

```

The result can be like :

```php


object(coderius\geoIp\City)#196 (2) {
  ["_geoname_id":"coderius\geoIp\City":private]=>
  int(5099836)
  ["_names":"coderius\geoIp\City":private]=>
  array(4) {
    ["en"]=>
    string(11) "Jersey City"
    ["ja"]=>
    string(24) "ジャージーシティ"
    ["ru"]=>
    string(21) "Джерси-Сити"
    ["zh-CN"]=>
    string(9) "泽西市"
  }
}
object(coderius\geoIp\Continent)#197 (3) {
  ["_code":"coderius\geoIp\Continent":private]=>
  string(2) "NA"
  ["_geoname_id":"coderius\geoIp\Continent":private]=>
  int(6255149)
  ["_names":"coderius\geoIp\Continent":private]=>
  array(8) {
    ["de"]=>
    string(11) "Nordamerika"
    ["en"]=>
    string(13) "North America"
    ["es"]=>
    string(13) "Norteamérica"
    ["fr"]=>
    string(17) "Amérique du Nord"
    ["ja"]=>
    string(15) "北アメリカ"
    ["pt-BR"]=>
    string(17) "América do Norte"
    ["ru"]=>
    string(31) "Северная Америка"
    ["zh-CN"]=>
    string(9) "北美洲"
  }
}
object(coderius\geoIp\Country)#198 (3) {
  ["_iso_code":"coderius\geoIp\Country":private]=>
  string(2) "US"
  ["_geoname_id":"coderius\geoIp\Country":private]=>
  int(6252001)
  ["_names":"coderius\geoIp\Country":private]=>
  array(8) {
    ["de"]=>
    string(3) "USA"
    ["en"]=>
    string(13) "United States"
    ["es"]=>
    string(14) "Estados Unidos"
    ["fr"]=>
    string(11) "États-Unis"
    ["ja"]=>
    string(21) "アメリカ合衆国"
    ["pt-BR"]=>
    string(14) "Estados Unidos"
    ["ru"]=>
    string(6) "США"
    ["zh-CN"]=>
    string(6) "美国"
  }
}
object(coderius\geoIp\Location)#199 (5) {
  ["_accuracy_radius":"coderius\geoIp\Location":private]=>
  int(1000)
  ["_latitude":"coderius\geoIp\Location":private]=>
  float(40.7209)
  ["_longitude":"coderius\geoIp\Location":private]=>
  float(-74.0468)
  ["_metro_code":"coderius\geoIp\Location":private]=>
  int(501)
  ["_time_zone":"coderius\geoIp\Location":private]=>
  string(16) "America/New_York"
}
object(coderius\geoIp\Postal)#200 (3) {
  ["_code":"coderius\geoIp\Postal":private]=>
  string(5) "07302"
  ["_geoname_id":"coderius\geoIp\Postal":private]=>
  NULL
  ["_names":"coderius\geoIp\Postal":private]=>
  array(0) {
  }
}
object(coderius\geoIp\RegisteredCountry)#201 (3) {
  ["_iso_code":"coderius\geoIp\RegisteredCountry":private]=>
  string(2) "US"
  ["_geoname_id":"coderius\geoIp\RegisteredCountry":private]=>
  int(6252001)
  ["_names":"coderius\geoIp\RegisteredCountry":private]=>
  array(8) {
    ["de"]=>
    string(3) "USA"
    ["en"]=>
    string(13) "United States"
    ["es"]=>
    string(14) "Estados Unidos"
    ["fr"]=>
    string(11) "États-Unis"
    ["ja"]=>
    string(21) "アメリカ合衆国"
    ["pt-BR"]=>
    string(14) "Estados Unidos"
    ["ru"]=>
    string(6) "США"
    ["zh-CN"]=>
    string(6) "美国"
  }
}
array(1) {
  [0]=>
  object(coderius\geoIp\Subdivision)#202 (3) {
    ["_iso_code":"coderius\geoIp\Subdivision":private]=>
    string(2) "NJ"
    ["_geoname_id":"coderius\geoIp\Subdivision":private]=>
    int(5101760)
    ["_names":"coderius\geoIp\Subdivision":private]=>
    array(7) {
      ["en"]=>
      string(10) "New Jersey"
      ["es"]=>
      string(12) "Nueva Jersey"
      ["fr"]=>
      string(10) "New Jersey"
      ["ja"]=>
      string(27) "ニュージャージー州"
      ["pt-BR"]=>
      string(12) "Nova Jérsia"
      ["ru"]=>
      string(19) "Нью-Джерси"
      ["zh-CN"]=>
      string(12) "新泽西州"
    }
  }
}


```

When try to convert object to string like below, returned data from method _toString in equal classes objects:

```php
echo $ip->city;
echo "\n";
echo $ip->continent;
echo "\n";
echo $ip->country;
echo "\n";
echo $ip->location;
echo "\n";
echo $ip->postal;
echo "\n";
echo $ip->registeredCountry;
echo "\n";
echo $ip->subdivisions[0];
echo "\n";

```

Output:

```php
Jersey City
North America
United States
-74.0468 40.7209
07302
United States
New Jersey


```

For example get more info from city object:

```php

$ip->city->GeonameId;
$lang = Yii::$app->language;

echo $ip->city->names->$lang;

```

This product includes GeoLite2 data created by MaxMind, available from http://www.maxmind.com
