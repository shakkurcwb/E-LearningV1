<?php

namespace App\Traits\Merchant\Subscriptions;

trait ActiveSubscriptionTrait
{
    /**
     * Get the User's Active Subscription.
     *
     * @return String
     */
    public function getActiveSubscriptionAttribute()
    {
        return $this->subscriptions()
            ->where('state', 'Activated')
            ->orderBy('updated_at', 'DESC')
            ->first();
    }
}