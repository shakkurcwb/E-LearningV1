<?php

namespace App\Traits\Account\Users;

trait ProfileProgression
{
    /**
     * Get the User's Profile Progression.
     * 
     * @return Integer
     */
    public function getProfileProgressionAttribute(): int
    {
        return $this->profileProgression();
    }

    /**
     * Calculate the User's Profile Progression.
     * 
     * @return Integer
     */
    public function profileProgression(): int
    {
        $progress = 0;
        if ($this->person->isFilled()) $progress += 50;
        if ($this->address->isFilled()) $progress += 25;
        if ($this->phone->isFilled()) $progress += 25;
        return $progress;
    }
}