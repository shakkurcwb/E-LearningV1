<?php

namespace App\Traits\Account\Users;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait ApiTokenGenerator
{
    /**
     * Generate the User's Api Token.
     *
     * @return String
     */
    public static function generateApiToken(): String
    {
        return Hash::make(Str::random(60));
    }
}