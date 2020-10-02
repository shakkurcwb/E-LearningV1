<?php

namespace App\Listeners\Account\Person;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\PersonUpdatedEvent;

use App\Notifications\Account\PersonQuestCompleted;

class SendNotificationOnce
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
     * @param  PersonUpdatedEvent  $event
     * @return void
     */
    public function handle(PersonUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', PersonQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() == 0)
        {
            // Trigger Notification
            Notification::send($event->user, new PersonQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 2);
        }
    }
}
