<?php

namespace HttpOz\Locked\Http\Middleware;

use Closure;
use HttpOz\Locked\Exceptions\ApplicationLockedException;

class IsLocked {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @throws ApplicationLockedException
	 * @return mixed
	 */
	public function handle( $request, Closure $next ) {
		if ( config( 'locked.enabled' ) ) {
			$inWindow = strtotime( 'today' ) >= strtotime( config( 'locked.between.start' ) ) && strtotime( 'today' ) <= strtotime( config( 'locked.between.end' ) );
			if ($inWindow) {
				throw new ApplicationLockedException($request);
			}
		}

		return $next( $request );
	}
}