<?php

namespace App\Traits\Merchant\Subscriptions;

trait TotalPriceTrait
{
    /**
     * Calculate the total price of the subscription.
     *
     * @return String
     */
    public function getTotalAttribute(): float
    {
        $price = $this->plan->price;
        $quantity = $this->attributes['quantity'] ?? 1;
        $discount = $this->coupon ? $this->coupon->discount : 0;
        return ( ( $price * $quantity ) - $discount);
    }
}