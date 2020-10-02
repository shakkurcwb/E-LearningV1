<?php

namespace App\Libraries;

use Exception;
use Log;

class Logger
{
    /**
     * Report or log an exception.
     * 
     * @param Exception $e
     * @return Void
     */
    public static function report(Exception $e): Void
    {
        Log::error($e->getMessage());
    }

    /**
     * Abort process execution with error 500.
     * 
     * @return Void
     */
    public static function abort(): Void
    {
        abort(500);
    }
}