<?php

namespace App\Listeners\Account\Preferences;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\PreferencesUpdatedEvent;

use App\Notifications\Account\PreferencesQuestCompleted;

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
     * @param  PreferencesUpdatedEvent  $event
     * @return void
     */
    public function handle(PreferencesUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', PreferencesQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() === 0)
        {
            // Trigger Notification
            Notification::send($event->user, new PreferencesQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 2);
        }
    }
}
