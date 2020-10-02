<?php

namespace App\Listeners\Account\Settings\Avatar;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\AvatarUpdatedEvent;

use App\Notifications\Account\AvatarQuestCompleted;

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
     * @param  AvatarUpdatedEvent  $event
     * @return void
     */
    public function handle(AvatarUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', AvatarQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() === 0)
        {
            // Trigger Notification
            Notification::send($event->user, new AvatarQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 1);
        }
    }
}
