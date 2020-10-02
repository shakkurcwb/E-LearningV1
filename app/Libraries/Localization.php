<?php

namespace App\Libraries;

class Localization
{
    /** Properties */
    protected $locale, $fallback;

    /** Lang folder */
    private $folder;

    /** Lang files to be translated */
    public $files = [
        'education',
        'account',
        'merchant', 
        'general',
    ];

    /**
     * Build new localization object.
     * 
     * @param String $locale
     * @param String $fallback
     */
    public function __construct(String $locale = null, String $fallback = null)
    {
        $this->locale = $locale ?? app()->getLocale();
        $this->fallback = $fallback ?? config('app.fallback_locale');

        $this->folder = resource_path('lang');
    }

    /**
     * Process and return an array with the translations.
     * 
     * @return Array
     */
    public function toArray(): Array
    {
        $content = [];
        foreach($this->files as $file)
        {
            $path = $this->folder . '/' . $this->locale . '/' . $file . '.php';
            if (!file_exists($path))
            {
                $path = $this->folder . '/' . $this->fallback . '/' . $file . '.php';
            }
            $content[$file] = include($path);
        }
        return $content;
    }

    /**
     * Build and return a string (Json) with the translations.
     * 
     * @return String
     */
    public static function toJson(): String
    {
        $translation = new Localization;
        return json_encode($translation->toArray());
    }

}