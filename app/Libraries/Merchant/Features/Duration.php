<?php

namespace App\Libraries\Merchant\Features;

class Duration
{
    public const ONE_HOUR = '01:00:00';
    public const TWO_HOURS = '02:00:00';
    public const THREE_HOURS = '03:00:00';

    public static function getValues()
    {
        return [
            self::ONE_HOUR => __(self::ONE_HOUR),
            self::TWO_HOURS => __(self::TWO_HOURS),
            self::THREE_HOURS => __(self::THREE_HOURS),
        ];
    }
}
