<?php

namespace App\Listeners\Account\Settings\Background;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\BackgroundUpdatedEvent;

use App\Notifications\Account\BackgroundQuestCompleted;

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
     * @param  BackgroundUpdatedEvent  $event
     * @return void
     */
    public function handle(BackgroundUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', BackgroundQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() === 0)
        {
            // Trigger Notification
            Notification::send($event->user, new BackgroundQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 1);
        }
    }
}
