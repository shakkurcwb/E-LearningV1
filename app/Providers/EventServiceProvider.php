<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Registered' => [
            'Illuminate\Auth\Listeners\SendEmailVerificationNotification',
        ],
        'Illuminate\Auth\Events\Authenticated' => [
            'App\Listeners\Account\UserAuthenticated',
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\Account\UserLogin',
        ],

        // Account
        'App\Events\Account\FeedbackCreatedEvent' => [
            'App\Listeners\Account\FeedbackCreatedListener',
        ],
        'App\Events\Account\UserCreatedEvent' => [
            'App\Listeners\Account\User\SendNotificationOnCreation',
        ],
        'App\Events\Account\PersonUpdatedEvent' => [
            'App\Listeners\Account\Person\SendNotificationOnce',
        ],
        'App\Events\Account\AddressUpdatedEvent' => [
            'App\Listeners\Account\Address\SendNotificationOnce',
        ],
        'App\Events\Account\PhoneUpdatedEvent' => [
            'App\Listeners\Account\Phone\SendNotificationOnce',
        ],
        'App\Events\Account\PreferencesUpdatedEvent' => [
            'App\Listeners\Account\Preferences\SendNotificationOnce',
        ],
        'App\Events\Account\AvailabilitiesUpdatedEvent' => [
            'App\Listeners\Account\Availabilities\SendNotificationOnce',
        ],
        'App\Events\Account\BankAccountUpdatedEvent' => [
            'App\Listeners\Account\BankAccount\SendNotificationOnce',
        ],
        'App\Events\Account\AvatarUpdatedEvent' => [
            'App\Listeners\Account\Settings\Avatar\SendNotificationOnce',
        ],
        'App\Events\Account\BackgroundUpdatedEvent' => [
            'App\Listeners\Account\Settings\Background\SendNotificationOnce',
        ],

        // Merchant
        'App\Events\Merchant\SubscriptionRequestedEvent' => [
            'App\Listeners\Merchant\SubscriptionRequestedListener',
        ],
        'App\Events\Merchant\SubscriptionActivatedEvent' => [
            'App\Listeners\Merchant\SubscriptionActivatedListener',
        ],

        // Education
        'App\Events\Education\AdmissionRequestedEvent' => [
            'App\Listeners\Education\Admission\SendNotificationWhenRequested',
        ],
        'App\Events\Education\AdmissionApprovedEvent' => [
            'App\Listeners\Education\Admission\SendNotificationWhenApproved',
        ],
        'App\Events\Education\AdmissionRejectedEvent' => [
            'App\Listeners\Education\Admission\SendNotificationWhenRejected',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // 
    }
}
