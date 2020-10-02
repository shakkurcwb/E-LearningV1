<?php

namespace App\Listeners\Merchant;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use App\Notifications\Merchant\SubscriptionRequested;

use App\Events\Merchant\SubscriptionRequestedEvent;

class SubscriptionRequestedListener
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
     * @param  SubscriptionRequestedEvent  $event
     * @return void
     */
    public function handle(SubscriptionRequestedEvent $event)
    {
        // Trigger Notification
        Notification::send($event->subscription->user, new SubscriptionRequested($event->subscription));
    }
}
