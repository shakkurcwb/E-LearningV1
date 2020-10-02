<?php

namespace App\Listeners\Account;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use App\Events\Account\FeedbackCreatedEvent;

use App\Notifications\Account\FeedbackCreated;

class FeedbackCreatedListener
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
     * @param  FeedbackCreatedEvent  $event
     * @return void
     */
    public function handle(FeedbackCreatedEvent $event)
    {
        // Trigger Notification
        Notification::send($event->feedback->user, new FeedbackCreated($event->feedback));
    }
}
