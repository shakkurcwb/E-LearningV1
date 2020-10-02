<?php

namespace App\Libraries\Account\Settings;

class Theme
{
    public const BLUE = 'Blue';
    public const PURPLE = 'Purple';
    public const RED = 'Red';
    public const GREEN = 'Green';
    public const CYAN = 'Cyan';
    public const PINK = 'Pink';

    public static function getValues()
    {
        return [
            self::BLUE => __(self::BLUE),
            self::PURPLE => __(self::PURPLE),
            self::RED => __(self::RED),
            self::GREEN => __(self::GREEN),
            self::CYAN => __(self::CYAN),
            self::PINK => __(self::PINK),
        ];
    }
}