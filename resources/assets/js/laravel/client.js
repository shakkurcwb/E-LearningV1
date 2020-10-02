$( document ).ready(function() {

    // Locale
    const locale = $('input[name="locale"]');
    if (locale.length > 0) {
        // locale.val(window.Laravel.client.locale);
    }

    // Timezone
    const timezone = $('input[name="timezone"]');
    if (timezone.length > 0) {
        timezone.val(window.Laravel.client.timezone);
    }

});