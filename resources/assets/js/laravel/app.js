
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Client Information
const getLang = () => navigator.language || navigator.browserLanguage || ( navigator.languages || [ "en" ] ) [ 0 ];
const getTimezone = () => Intl.DateTimeFormat().resolvedOptions().timeZone;

const locale = getLang().toString().replace('-', '_');
const language = locale.substr(0, 2);
const timezone = getTimezone().toString();

window.Laravel.client = {
    language: language,
    locale: locale,
    timezone: timezone,
};