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
        "coderius/yii2-geo-ip": "~1.0.2"
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

$ip = Yii::$app->geoip->ip("208.113.83.165");

### Base usage


Access to private properties is done with getters

```php

$ip = Yii::$app->geoip->ip("208.113.83.165")//or Yii::$app->geoip->ip() for current user

if($ip->hasResult()){
    //Select the desired property, according to the tree, which showed

    $ip->country->names->en;//string 'United States'
    $ip->country->names->ru;//string 'США'
    $ip->country->geoname_id;//int 6252001
    $ip->country->isoCode;//string 'US'


    $ip->city->geonameId;//int 5099836
    $ip->city->names->en;//string 'Jersey City'
    $ip->city->names->ru;//string 'Джерси-Сити'

    $ip->location->latitude;//float 40.7209
    $ip->location->longitude;//float -74.0468
    $ip->location->metroCode;//int 501
    $ip->location->timeZone;//string 'America/New_York'

    $ip->postal->code;//string '07302'

    $ip->registered_country->geoname_id;//int 6252001
    $ip->registered_country->isoCode;// string 'US'
    $ip->registered_country->names;//string 'America/New_York'

    $ip->subdivisions->arr[0]->names->en//string 'New Jersey'      
}




//etc.
```

### Provide a custom database (for example, if you own a licence)

```php
<?php

$config = [
    ...
    'components' => [
        'geoip' => [
            'class' => 'coderius\GeoIP\GeoIP',
            'dbPath' => Yii::getAlias('@example/maxmind/database/city.mmdb')
        ],
    ]
    ...
];
```



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
object(coderius\geoIp\City)[47]
  private '_geoname_id' => int 5099836
  private '_names' => 
    array (size=4)
      'en' => string 'Jersey City' (length=11)
      'ja' => string 'ジャージーシティ' (length=24)
      'ru' => string 'Джерси-Сити' (length=21)
      'zh-CN' => string '泽西市' (length=9)
object(coderius\geoIp\Continent)[47]
  private '_code' => string 'NA' (length=2)
  private '_geoname_id' => int 6255149
  private '_names' => 
    array (size=8)
      'de' => string 'Nordamerika' (length=11)
      'en' => string 'North America' (length=13)
      'es' => string 'Norteamérica' (length=13)
      'fr' => string 'Amérique du Nord' (length=17)
      'ja' => string '北アメリカ' (length=15)
      'pt-BR' => string 'América do Norte' (length=17)
      'ru' => string 'Северная Америка' (length=31)
      'zh-CN' => string '北美洲' (length=9)
object(coderius\geoIp\Country)[47]
  private '_iso_code' => string 'US' (length=2)
  private '_geoname_id' => int 6252001
  private '_names' => 
    array (size=8)
      'de' => string 'USA' (length=3)
      'en' => string 'United States' (length=13)
      'es' => string 'Estados Unidos' (length=14)
      'fr' => string 'États-Unis' (length=11)
      'ja' => string 'アメリカ合衆国' (length=21)
      'pt-BR' => string 'Estados Unidos' (length=14)
      'ru' => string 'США' (length=6)
      'zh-CN' => string '美国' (length=6)
object(coderius\geoIp\Location)[47]
  private '_accuracy_radius' => int 1000
  private '_latitude' => float 40.7209
  private '_longitude' => float -74.0468
  private '_metro_code' => int 501
  private '_time_zone' => string 'America/New_York' (length=16)

```


This product includes GeoLite2 data created by MaxMind, available from http://www.maxmind.com
