<?php

namespace App\Traits\Account\Settings;

const DEFAULT_AVATAR = "media/avatars/avatar0.jpg";

trait AvatarUrl
{
    /**
     * Generate a Url for Setting's Avatar.
     *
     * @return String
     */
    public function getAvatarUrlAttribute(): String
    {
        if (!empty($this->avatar))
        {
            return asset('storage/' . $this->avatar);
        }
        return asset(DEFAULT_AVATAR);
    }
}