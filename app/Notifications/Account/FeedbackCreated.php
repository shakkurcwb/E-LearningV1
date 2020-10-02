<?php

namespace App\Notifications\Account;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Account\FeedbackModel;

use App\Notifications\NotificationTrait;

class FeedbackCreated extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    private $feedback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(FeedbackModel $feedback)
    {
        $this->feedback = $feedback;
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
        $subject = __('Feedback Received');
        $description = __('We received your feedback, and we will answer it as soon as possible.');

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
            'title' => 'Feedback was sent!',
        ];
    }
}
