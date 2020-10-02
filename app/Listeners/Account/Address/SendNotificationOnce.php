<?php

namespace App\Listeners\Account\Address;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\AddressUpdatedEvent;

use App\Notifications\Account\AddressQuestCompleted;

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
     * @param  AddressUpdatedEvent  $event
     * @return void
     */
    public function handle(AddressUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', AddressQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() === 0)
        {
            // Trigger Notification
            Notification::send($event->user, new AddressQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 2);
        }
    }
}
