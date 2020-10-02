<?php

namespace App\Libraries\Merchant\Plans;

class Interval
{
    public const SINGLE = 'Single';
    public const WEEKLY = 'Weekly';
    public const MONTHLY = 'Monthly';

    public static function getValues()
    {
        return [
            self::SINGLE => __(self::SINGLE),
            self::WEEKLY => __(self::WEEKLY),
            self::MONTHLY => __(self::MONTHLY),
        ];
    }
}