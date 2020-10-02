<?php

namespace App\Models\Common;

use App\Models\Common\Scopes\HasGetAll;

class GenderModel
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
            'male' => __('general.genders.male'),
            'female' => __('general.genders.female'),
        ];
    }
}