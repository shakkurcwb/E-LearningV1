<?php

namespace App\Libraries\Account\Users;

class State
{
    const INACTIVE = "Inactive";
    const ACTIVE = "Active";
    const ON_VALIDATION = "On Validation";
    const BANNED = "Banned";

    public static function getValues()
    {
        return [
            self::INACTIVE => __(self::INACTIVE),
            self::ACTIVE => __(self::ACTIVE),
            self::ON_VALIDATION => __(self::ON_VALIDATION),
            self::BANNED => __(self::BANNED),
        ];
    }
}