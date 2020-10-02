<?php

namespace App\Libraries;

class Tools
{
    /**
     * Format Price to Cents
     * 
     * @param Float $price
     * @return String
     */
    public static function priceToCents(float $price): string
    {
        return bcmul($price, 100);
    }
}