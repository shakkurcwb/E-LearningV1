<?php

namespace App\Traits\Account\Settings;

const DEFAULT_BACKGROUND = "media/photos/photo1@2x.jpg";

trait BackgroundUrl
{
    /**
     * Generate a Url for Setting's Background.
     *
     * @return String
     */
    public function getBackgroundUrlAttribute(): String
    {
        if (!empty($this->background))
        {
            return asset('storage/' . $this->background);
        }
        return asset(DEFAULT_BACKGROUND);
    }
}