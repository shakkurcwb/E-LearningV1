<?php

namespace App\Libraries\Account\Address;

class Country
{
    public const BRAZIL = 'Brazil';
    public const UNITED_STATES = 'United States';
    public const CANADA = 'Canada';
    public const AUSTRALIA = 'Australia';

    public static function getValues()
    {
        return [
            self::BRAZIL => __(self::BRAZIL),
            self::UNITED_STATES => __(self::UNITED_STATES),
            self::CANADA => __(self::CANADA),
            self::AUSTRALIA => __(self::AUSTRALIA),
        ];
    }
}