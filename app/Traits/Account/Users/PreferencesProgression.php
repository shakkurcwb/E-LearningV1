<?php

namespace App\Traits\Account\Users;

trait PreferencesProgression
{
    /**
     * Get the User's Preferences Progression.
     * 
     * @return Integer
     */
    public function getPreferencesProgressionAttribute(): int
    {
        return $this->preferencesProgression();
    }

    /**
     * Calculate the User's Preferences Progression.
     * 
     * @return Integer
     */
    public function preferencesProgression(): int
    {
        $progress = 0;
        if ($this->preferences->isFilled()) $progress += 50;
        if ($this->bank_account->isFilled()) $progress += 50;
        return $progress;
    }
}