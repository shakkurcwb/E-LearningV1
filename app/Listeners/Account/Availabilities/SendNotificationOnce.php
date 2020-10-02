<?php

namespace App\Listeners\Account\Availabilities;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\AvailabilitiesUpdatedEvent;

use App\Notifications\Account\AvailabilitiesQuestCompleted;

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
     * @param  AvailabilitiesUpdatedEvent  $event
     * @return void
     */
    public function handle(AvailabilitiesUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', AvailabilitiesQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() === 0)
        {
            // Trigger Notification
            Notification::send($event->user, new AvailabilitiesQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 2);
        }
    }
}
