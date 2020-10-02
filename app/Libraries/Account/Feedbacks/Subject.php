<?php

namespace App\Libraries\Account\Feedbacks;

class Subject
{
    public const ACCESS = 'Access';
    public const PAYMENT = 'Payment';
    public const BUG = 'Bug';
    public const SUGGESTION = 'Suggestion';
    public const OTHER = 'Other';

    public static function getValues()
    {
        return [
            self::ACCESS => __(self::ACCESS),
            self::PAYMENT => __(self::PAYMENT),
            self::BUG => __(self::BUG),
            self::SUGGESTION => __(self::SUGGESTION),
            self::OTHER => __(self::OTHER),
        ];
    }
}