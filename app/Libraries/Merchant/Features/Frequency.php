<?php

namespace App\Libraries\Merchant\Features;

class Frequency
{
    public const UNIQUE = 'Unique';
    public const ONCE_PER_WEEK = 'Once Per Week';
    public const TWICE_PER_WEEK = 'Twice Per Week';
    public const THRICE_PER_WEEK = 'Thrice Per Week';

    public static function getValues()
    {
        return [
            self::UNIQUE => __(self::UNIQUE),
            self::ONCE_PER_WEEK => __(self::ONCE_PER_WEEK),
            self::TWICE_PER_WEEK => __(self::TWICE_PER_WEEK),
            self::THRICE_PER_WEEK => __(self::THRICE_PER_WEEK),
        ];
    }
}