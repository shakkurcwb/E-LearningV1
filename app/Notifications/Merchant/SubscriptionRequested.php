<?php

namespace App\Notifications\Merchant;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Merchant\SubscriptionModel;

use App\Notifications\NotificationTrait;

class SubscriptionRequested extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    private $subscription;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(SubscriptionModel $subscription)
    {
        $this->subscription = $subscription;
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
        $subject = __('Subscription Requested');
        $description = __('Your subscription has been requested. Check your inbox for the next steps.');

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
            'title' => 'Subscription Requested!',
        ];
    }
}
