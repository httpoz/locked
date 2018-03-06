# Locked
Laravel package to lock an app after x - date.

[![Build Status](https://travis-ci.org/httpoz/locked.svg)](https://travis-ci.org/httpoz/locked)
[![Total Downloads](https://poser.pugx.org/httpoz/locked/d/total.svg)](https://packagist.org/packages/httpoz/locked)
[![PHPPackages Rank](http://phppackages.org/p/httpoz/locked/badge/rank.svg)](http://phppackages.org/p/httpoz/locked)

# Composer
```php
composer require httpoz/locked
```

# Config File
To publish the package config's file to your application. Run this command inside your terminal.

```
php artisan vendor:publish --provider="HttpOz\Roles\RolesServiceProvider"
```

# Middleware
This package comes with IsLocked middleware. You must add them inside your app/Http/Kernel.php file.

```php
<?php

/**
 * The application's route middleware.
 *
 * @var array
 */
protected $routeMiddleware = [
    // ...
	'isLocked' => \HttpOz\Locked\Middleware\IsLocked::class,
];
```

Now you can easily protect your routes.

```php
<?php

Route::group(['middleware' => 'isLocked'], function(){
	// your routes
});

```

It throws \HttpOz\Locked\Exceptions\ApplicationLocked if the logic determines the application is locked at this point in time which in turn renders a view.

You can override the view with your own by creating a file here `resources\views\vendor\httpoz\locked\locked.blade.php`