<?php

namespace App\Traits\Account\People;

use Illuminate\Support\Carbon;

trait AgeAttribute
{
    /**
     * Get the User's Age.
     * 
     * @return Integer
     */
    public function getAgeAttribute(): int
    {
        return $this->age();
    }

    /**
     * Calculate the User's Age.
     * 
     * @return Integer
     */
    public function age(): int
    {
        return Carbon::parse($this->attributes['birth'])->age;
    }
}