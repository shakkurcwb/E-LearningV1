<?php

namespace App\Listeners\Account\BankAccount;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use Illuminate\Notifications\DatabaseNotification;

use App\Events\Account\BankAccountUpdatedEvent;

use App\Notifications\Account\BankAccountQuestCompleted;

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
     * @param  BankAccountUpdatedEvent  $event
     * @return void
     */
    public function handle(BankAccountUpdatedEvent $event)
    {
        $notifications = DatabaseNotification::where('type', BankAccountQuestCompleted::class)
            ->where('notifiable_id', $event->user->id)
            ->get();

        if ($notifications->count() === 0)
        {
            // Trigger Notification
            Notification::send($event->user, new BankAccountQuestCompleted($event->user));

            // Increase RP
            $event->user->increment('reputation', 2);
        }
    }
}
