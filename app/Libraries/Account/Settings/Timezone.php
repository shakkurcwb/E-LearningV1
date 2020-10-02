<?php

namespace App\Libraries\Account\Settings;

class Timezone
{
    public const SAO_PAULO = 'America/Sao_Paulo';
    public const NORONHA = 'America/Noronha';
    public const MANAUS = 'America/Manaus';
    public const RIO_BRANCO = 'America/Rio_Branco';

    public const NEW_YORK = 'America/New_York';
    public const TORONTO = 'America/Toronto';
    public const VANCOUVER = 'America/Vancouver';
    public const DENVER = 'America/Denver';

    public static function getValues()
    {
        return [
            self::SAO_PAULO => __(self::SAO_PAULO),
            self::NORONHA => __(self::NORONHA),
            self::MANAUS => __(self::MANAUS),
            self::RIO_BRANCO => __(self::RIO_BRANCO),
            self::NEW_YORK => __(self::NEW_YORK),
            self::TORONTO => __(self::TORONTO),
            self::VANCOUVER => __(self::VANCOUVER),
            self::DENVER => __(self::DENVER),
        ];
    }
}