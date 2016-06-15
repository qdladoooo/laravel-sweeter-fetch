##laravel-sweeter-fetch - fetch for Laravel
Wrapper of PDO.

Procedure oriented, Pre process, As supplement of ORM.

[![Latest Stable Version](https://poser.pugx.org/qdladoooo/laravel-sweeter-fetch/v/stable)](https://packagist.org/packages/qdladoooo/laravel-sweeter-fetch)
[![Latest Unstable Version](https://poser.pugx.org/qdladoooo/laravel-sweeter-fetch/v/unstable)](https://packagist.org/packages/qdladoooo/laravel-sweeter-fetch)
[![License](https://poser.pugx.org/qdladoooo/laravel-sweeter-fetch/license)](https://packagist.org/packages/qdladoooo/laravel-sweeter-fetch)
##Installation
```shell
composer require qdladoooo/laravel-sweeter-fetch
```
##Initialization
```php
use SweeterFetch\LaravelSF;

//take db_connection as parameter 
$sf = new LaravelSF();
```
##Use
Execute none query

```php
//return nothing
$sf->Enq('use candy_shop;');
```

Execute query

```php
//return [row1, row2, ...]
$sf->Eq($sql);
```
Execute one row

```php
//return the first row by array
$sf->Eor($sql);
```

Execute column

```php
//return a column
$sf->Ec($sql);
```

Execute scalar 

```php
//return a number
$sf->Es($sql);
```
## License

The laravel-sweeter-fetch is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

