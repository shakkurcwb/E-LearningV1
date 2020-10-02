<?php

namespace App\Listeners\Account;

use App\Libraries\Account\Users\Role;
use App\Libraries\Account\Users\State;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class UserLogin
{
    protected $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $user->last_login_at = now();
        $user->ip_address = $this->request->ip();
        $user->save();
    }
}
