<?php

namespace App\Http\Middleware;

use App\Libraries\Account\Users\Role;

class IsStudent
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
        if ($request->user()->role !== Role::STUDENT) {
            return redirect('/home');
        }
        return $next($request);
    }
}
