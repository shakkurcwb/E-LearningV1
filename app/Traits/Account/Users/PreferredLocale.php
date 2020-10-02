<?php

namespace App\Traits\Account\Users;

trait PreferredLocale
{
    /**
     * Get the User's Preferred Locale.
     * 
     * @return String
     */
    public function getPreferredLocaleAttribute(): String
    {
        return $this->preferredLocale();
    }

    /**
     * Get the User's Preferred Locale.
     *
     * @return String
     */
    public function preferredLocale(): String
    {
        return $this->settings->locale ?? config('app.locale');
    }
}