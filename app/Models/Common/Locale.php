<?php

namespace App\Models\Account;

class Locale
{
    /**
     * Available Locales.
     */
    const PORTUGUESE = 'pt_BR';
    const ENGLISH = 'en';
    const FRENCH = 'fr';
    const SPANISH = 'es';

    /**
     * Get Available Locales in Array.
     * 
     * @return Array
     */
    public static function availableLocales(): Array
    {
        return [
            self::PORTUGUESE => __('common.locales.portuguese'),
            self::ENGLISH => __('common.locales.english'),
            self::FRENCH => __('common.locales.french'),
            self::SPANISH => __('common.locales.spanish'),
        ];
    }

    /**
     * Check if Locale is Valid.
     * 
     * @param String $locale
     * @return Boolean
     */
    public static function isValid(String $locale): bool
    {
        return array_key_exists($locale, self::availableLocales());
    }
}