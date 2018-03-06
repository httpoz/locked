<?php

namespace HttpOz\Locked\Tests\Feature;

use HttpOz\Locked\Middleware\IsLocked;
use HttpOz\Locked\Tests\TestCase;
use Illuminate\Http\Request;

class RouteTest extends TestCase {

	public function testHomeRoute() {
		$response = $this->get('/');

		$response->assertStatus(200);
		$response->assertSee('Hello');
	}

	public function testRouteWhenLockDisabled() {
		$response = $this->get('/protected');

		$response->assertStatus(200);
		$response->assertSee('Protected');
	}

	// test middleware

}