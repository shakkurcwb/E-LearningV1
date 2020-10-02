<?php

namespace App\Traits\Account\Users;

use Illuminate\Support\Facades\Hash;

trait EncryptPassword
{
    /**
     * Set the User's Password.
     *
     * @param String $value
     * @return Void
     */
    public function setPasswordAttribute(?String $value): Void
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}