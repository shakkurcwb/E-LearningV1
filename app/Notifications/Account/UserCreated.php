<?php

namespace App\Notifications\Account;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Foundation\Auth\User as UserModel;

use App\Notifications\NotificationTrait;

class UserCreated extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(UserModel $user)
    {
        $this->user = $user;
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
        $subject = __('User Created');
        $description = __('Your account has been created. Please verify your email address or resent a verification mail.');

        $action = __('Resent Verification Mail');
        $url = route('verification.notice');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($this->greetings())
                    ->line($description)
                    ->action($action, $url)
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
            'title' => 'You have been registered!',
        ];
    }
}
