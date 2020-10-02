<?php

namespace App\Listeners\Account\User;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use App\Events\Account\UserCreatedEvent;

use App\Notifications\Account\UserCreated;

class SendNotificationOnCreation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreatedEvent  $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        // Trigger Notification
        Notification::send($event->user, new UserCreated($event->user));
    }
}
