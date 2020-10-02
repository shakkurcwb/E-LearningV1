<?php

namespace App\Listeners\Education\Admission;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

use App\Notifications\Education\AdmissionApproved;

use App\Events\Education\AdmissionApprovedEvent;

class SendNotificationWhenApproved
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
     * @param  AdmissionApprovedEvent  $event
     * @return void
     */
    public function handle(AdmissionApprovedEvent $event)
    {
        // Trigger Notification
        Notification::send($event->admission->user, new AdmissionApproved($event->admission));
    }
}
