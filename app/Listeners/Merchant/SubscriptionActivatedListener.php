<?php

namespace App\Listeners\Merchant;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use App\Notifications\Merchant\SubscriptionActivated;

use App\Events\Merchant\SubscriptionActivatedEvent;

class SubscriptionActivatedListener
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
     * @param  SubscriptionActivatedEvent  $event
     * @return void
     */
    public function handle(SubscriptionActivatedEvent $event)
    {
        // Trigger Notification
        Notification::send($event->subscription->user, new SubscriptionActivated($event->subscription));
    }
}
