<?php

namespace App\Traits\Account\Users;

use Illuminate\Support\Str;

trait SluggableName
{
    /**
     * Set the User's Name.
     *
     * @param String $value
     * @return Void
     */
    public function setNameAttribute(String $value): Void
    {
        $this->attributes['name'] = Str::slug($value, '-');
    }
}