<?php

namespace HttpOz\Locked\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra {
	public function getEnvironmentSetUp( $app ) {
		$app['config']->set(
			'locked',
			[
				'enabled' => false,
				'between' => [
					'start' => null,
					'end'   => null,
				]
			]
		);

		$router = $app['router'];

		$router->get( '/', function () {
			return 'Hello';
		} );

		$router->get( '/protected', function () {
			return 'Protected';
		} );
	}
}
