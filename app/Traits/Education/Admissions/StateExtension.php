<?php

namespace App\Traits\Education\Admissions;

use App\Libraries\Education\Admissions\State;

trait StateExtension
{
    /**
     * Get the Admission State.
     *
     * @param String $value
     * @return String
     */
    public function getStateAttribute(): String
    {
        if (empty($this->attributes['verified_at']))
        {
            return State::PENDING;
        }
        else
        {
            if ($this->attributes['is_approved'])
            {
                return State::APPROVED;
            }
            else
            {
                return State::REJECTED;
            }
        }
    }
}