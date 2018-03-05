<?php

namespace HttpOz\Locked\Exceptions;

use Exception;

class ApplicationLockedException extends Exception {

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function render($request) {
		return response()->view('httpoz::locked.error');
	}

}