<?php

namespace App\Http\Middleware;

use App\Libraries\Account\Users\State;

class IsInactive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($request->user()->state !== State::INACTIVE) {
            return redirect('/home');
        }
        return $next($request);
    }
}
