<?php

namespace App\Models\Common;

use App\Models\Common\Scopes\HasGetAll;

class ThemeModel
{
    use HasGetAll;

    protected $data;

    /**
     * Load the JSON data and make it available in $data.
     * 
     * @return Void
     */
    public function __construct()
    {
        $this->data = [
            'default' => 'Default - Blue',
            'amethyst' => 'Amethyst - Purple',
            'city' => 'City - Red',
            'flat' => 'Flat - Ocean Green',
            'modern' => 'Modern - Ocean Blue',
            'smooth' => 'Smooth - Pink',
        ];
    }
}