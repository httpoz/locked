# Locked

Laravel package to lock an app after x - date.

[![Build Status](https://travis-ci.org/httpoz/locked.svg)](https://travis-ci.org/httpoz/locked)
[![Total Downloads](https://poser.pugx.org/httpoz/locked/d/total.svg)](https://packagist.org/packages/httpoz/locked)
[![PHPPackages Rank](http://phppackages.org/p/httpoz/locked/badge/rank.svg)](http://phppackages.org/p/httpoz/locked)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fhttpoz%2Flocked.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2Fhttpoz%2Flocked?ref=badge_shield)

# Composer

```php
composer require httpoz/locked:^v8.0
```

# Config File

To publish the package config's file to your application. Run this command inside your terminal.

```
php artisan vendor:publish --provider="HttpOz\Locked\LockedServiceProvider"
```

This package allows you to define your own rules that will determine whether the routes using the middleware should be locked or not. To get started open `config/locked.php` and set enabled to `true`. Next list your rule classes in the rules array.

## Rules

Your custom rule classes need to extend `HttpOz\Locked\Rules\Rule`;

```php
<?php

use HttpOz\Locked\Rules\Rule;

class InActivePeriod extends Rule
{
	/**
	 * The boolean response of this rule is used to determine whether the rule has passed or not.
	 */
	public function passes() : bool {
		return strtotime( 'today' ) >= strtotime('2018-05-31') && strtotime( 'today' ) <= strtotime('2022-05-31');
	}
}
```

The application will be locked on the first `false` returned from your rules.

# Middleware

This package comes with the `IsLocked` middleware. You must add it to your app/Http/Kernel.php file.

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


## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fhttpoz%2Flocked.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fhttpoz%2Flocked?ref=badge_large)
