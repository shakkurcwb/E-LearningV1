<?php

namespace App\Listeners\Account;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Http\Request;

class UserAuthenticated
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
     * @param  Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $user = $event->user;
        $user->last_seen_at = now();
        $user->save();
    }
}
