<?php

namespace App\Models\Common;

use App\Models\Common\Scopes\HasGetAll;

class CountryModel
{
    use HasGetAll;

    private $url = "http://country.io/names.json";

    protected $data;

    /**
     * Load the JSON data and make it available in $data.
     * 
     * @return Void
     */
    public function __construct()
    {
        $raw = file_get_contents($this->url);
        $this->data = json_decode($raw, true);
    }
}