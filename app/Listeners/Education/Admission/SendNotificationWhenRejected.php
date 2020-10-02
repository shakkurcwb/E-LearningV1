<?php

namespace App\Listeners\Education\Admission;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use App\Notifications\Education\AdmissionRejected;

use App\Events\Education\AdmissionRejectedEvent;

class SendNotificationWhenRejected
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
     * @param  AdmissionRejectedEvent  $event
     * @return void
     */
    public function handle(AdmissionRejectedEvent $event)
    {
        // Trigger Notification
        Notification::send($event->user, new AdmissionRejected($event->user));
    }
}
