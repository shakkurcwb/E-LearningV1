<?php

namespace App\Libraries\Account\Settings;

class Currency
{
    public const BRAZILIAN_REAL = 'BRL';
    public const AMERICAN_DOLLAR = 'USD';
    public const CANADIAN_DOLLAR = 'CAD';
    public const EURO = 'EUR';

    public static function getValues()
    {
        return [
            self::BRAZILIAN_REAL => __(self::BRAZILIAN_REAL),
            self::AMERICAN_DOLLAR => __(self::AMERICAN_DOLLAR),
            self::CANADIAN_DOLLAR => __(self::CANADIAN_DOLLAR),
            self::EURO => __(self::EURO),
        ];
    }
}