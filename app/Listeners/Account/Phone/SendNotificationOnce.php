<?php

namespace App\Listeners\Account\Phone;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\PhoneUpdatedEvent;

use App\Notifications\Account\PhoneQuestCompleted;

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
     * @param  PhoneUpdatedEvent  $event
     * @return void
     */
    public function handle(PhoneUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', PhoneQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() === 0)
        {
            // Trigger Notification
            Notification::send($event->user, new PhoneQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 2);
        }
    }
}
