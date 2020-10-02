<?php

namespace App\Http\Middleware;

use App\Libraries\Account\Settings\Locale;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $locale = config('app.locale');

        // From User Locale
        if ($request->user() && $request->user()->settings && $request->user()->settings->locale)
        {
            $locale = $request->user()->settings->locale;
        }

        // From Client Parameter
        if ($request->input('lang'))
        {
            $locale = $request->input('lang');
        }

        // Set Generic Language (if needed)
        if (!array_key_exists($locale, Locale::getValues()))
        {
            $locale = $this->getGenericLanguage($locale);
        }

        \App::setLocale($locale);

        return $next($request);
    }

    /**
     * This method helps to retrieve a generic language based on user locale.
     * 
     * @param String $locale
     * @return String
     */
    private function getGenericLanguage($locale): String
    {
        $language = substr($locale, 0, 2);
        switch($language)
        {
            case 'pt': {
                $locale = Locale::PORTUGUESE;
            } break;
            case 'fr': {
                $locale = Locale::FRENCH;
            } break;
            case 'es': {
                $locale = Locale::SPANISH;
            } break;
            case 'en': default: {
                $locale = Locale::ENGLISH;
            } break;
        }
        return $locale;
    }

}
