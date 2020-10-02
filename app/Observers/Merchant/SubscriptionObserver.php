<?php

namespace App\Observers\Merchant;

use App\Models\Merchant\SubscriptionModel;

use App\Notifications\Sales\UserCreated;
use App\Notifications\Sales\UserDeleted;
use App\Notifications\Sales\UserRestored;

class SubscriptionObserver
{
    /**
     * Handle the subscription "created" event.
     *
     * @param  \App\Models\Sales\SubscriptionModel  $subscription
     * @return void
     */
    public function created(SubscriptionModel $subscription)
    {
        $subscription->notify(new UserCreated($subscription));
    }

    /**
     * Handle the subscription "updated" event.
     *
     * @param  \App\Models\Sales\SubscriptionModel  $subscription
     * @return void
     */
    public function updated(SubscriptionModel $subscription)
    {
        // 
    }

    /**
     * Handle the subscription "deleted" event.
     *
     * @param  \App\Models\Sales\SubscriptionModel  $subscription
     * @return void
     */
    public function deleted(SubscriptionModel $subscription)
    {
        $subscription->notify(new UserDeleted($subscription));
    }

    /**
     * Handle the subscription "restored" event.
     *
     * @param  \App\Models\Sales\SubscriptionModel  $subscription
     * @return void
     */
    public function restored(SubscriptionModel $subscription)
    {
        $subscription->notify(new UserRestored($subscription));
    }

    /**
     * Handle the subscription "force deleted" event.
     *
     * @param  \App\Models\Sales\SubscriptionModel  $subscription
     * @return void
     */
    public function forceDeleted(SubscriptionModel $subscription)
    {
        $subscription->notify(new UserDeleted($subscription));
    }
}
