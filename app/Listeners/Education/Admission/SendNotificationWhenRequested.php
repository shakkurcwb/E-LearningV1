<?php

namespace App\Listeners\Education\Admission;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use App\Notifications\Education\AdmissionRequested;

use App\Events\Education\AdmissionRequestedEvent;

class SendNotificationWhenRequested
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
     * @param  AdmissionRequestedEvent  $event
     * @return void
     */
    public function handle(AdmissionRequestedEvent $event)
    {
        // Trigger Notification
        Notification::send($event->admission->user, new AdmissionRequested($event->admission));
    }
}
