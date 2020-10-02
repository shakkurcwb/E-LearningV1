<?php

namespace App\Libraries\Account\Users;

class Role
{
    const ADMIN = "Admin";
    const STUDENT = "Student";
    const TUTOR = "Tutor";

    public static function getValues()
    {
        return [
            self::ADMIN => __(self::ADMIN),
            self::STUDENT => __(self::STUDENT),
            self::TUTOR => __(self::TUTOR),
        ];
    }
}