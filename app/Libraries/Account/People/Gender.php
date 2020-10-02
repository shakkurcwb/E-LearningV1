<?php

namespace App\Libraries\Account\People;

class Gender
{
    public const MALE = 'Male';
    public const FEMALE = 'Female';

    public static function getValues()
    {
        return [
            self::MALE => __(self::MALE),
            self::FEMALE => __(self::FEMALE),
        ];
    }
}