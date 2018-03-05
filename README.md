# Locked
Laravel package to lock an app after x - date.

[![Build Status](https://travis-ci.org/httpoz/locked.svg)](https://travis-ci.org/httpoz/locked)
[![Total Downloads](https://poser.pugx.org/httpoz/locked/d/total.svg)](https://packagist.org/packages/httpoz/locked)
[![PHPPackages Rank](http://phppackages.org/p/httpoz/locked/badge/rank.svg)](http://phppackages.org/p/httpoz/locked)

# Installation
```php
composer require httpoz/locked
```

# SetUp
Add the middleware to app\Kernel.php
```php
    protected $routeMiddleware = [
        ...
    	'isLocked'      => \HttpOz\Locked\Middleware\IsLocked::class,
    	];
```

