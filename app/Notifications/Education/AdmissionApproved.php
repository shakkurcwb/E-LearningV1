<?php

namespace App\Notifications\Education;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Education\AdmissionModel;

use App\Notifications\NotificationTrait;

class AdmissionApproved extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    private $admission;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(AdmissionModel $admission)
    {
        $this->admission = $admission;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ 'mail', 'database' ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = __('Admission Approved');
        $description = __('Your admission has been approved.');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($this->greetings())
                    ->line($description)
                    ->line($this->footer());
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'icon' => $this->successIcon(),
            'title' => 'Admission was approved!',
        ];
    }
}
