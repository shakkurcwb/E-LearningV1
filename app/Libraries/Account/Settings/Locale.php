<?php

namespace App\Libraries\Account\Settings;

class Locale
{
    public const PORTUGUESE = 'pt_BR';
    public const ENGLISH = 'en_US';
    public const FRENCH = 'fr_FR';
    public const SPANISH = 'es_ES';

    public static function getValues()
    {
        return [
            self::PORTUGUESE => __(self::PORTUGUESE),
            self::ENGLISH => __(self::ENGLISH),
            self::FRENCH => __(self::FRENCH),
            self::SPANISH => __(self::SPANISH),
        ];
    }
}