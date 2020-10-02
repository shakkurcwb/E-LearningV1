<?php

namespace App\Models\Common;

use App\Models\Common\Scopes\HasGetAll;

class TimezoneModel
{
    use HasGetAll;

    private $file = "timezones.json";

    protected $data;

    /**
     * Load the JSON data and make it available in $data.
     * 
     * @return Void
     */
    public function __construct()
    {
        $url = resource_path('assets/json/' . $this->file);
        $raw = file_get_contents($url);
        $this->data = json_decode($raw, true);
    }
}