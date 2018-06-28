<?php

namespace HttpOz\Locked\Middleware;

use Closure;
use HttpOz\Locked\Exceptions\ApplicationLockedException;

class IsLocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @throws ApplicationLockedException
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('locked.enabled')) {
            $rules = config('locked.rules');
            if (!empty($rules)) {
                foreach ($rules as $rule) {
                    if (! (new $rule)->passes($request)) {
                        throw new ApplicationLockedException($request);
                    }
                }
            }
        }

        return $next($request);
    }
}
