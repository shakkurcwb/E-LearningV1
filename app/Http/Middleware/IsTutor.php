<?php

namespace App\Http\Middleware;

use App\Libraries\Account\Users\Role;

class IsTutor
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
        if ($request->user()->role !== Role::TUTOR) {
            return redirect('/home');
        }
        return $next($request);
    }
}
