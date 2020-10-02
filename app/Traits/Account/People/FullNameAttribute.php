<?php

namespace App\Traits\Account\People;

use Illuminate\Support\Carbon;

trait FullNameAttribute
{
    /**
     * Get the User's Full Name.
     * 
     * @return Integer
     */
    public function getFullNameAttribute(): string
    {
        return $this->fullName();
    }

    /**
     * Calculate the User's Full Name.
     * 
     * @return String
     */
    public function fullName(): string
    {
        $name = $this->attributes['first_name'];
        if ($this->attributes['middle_names'])
        {
            $name .= ' ' . $this->attributes['middle_names'];
        }
        $name .= ' ' . $this->attributes['last_name'];
        return $name;
    }
}