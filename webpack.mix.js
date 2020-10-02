const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix

    /* CSS */
    .sass('resources/assets/sass/main.scss', 'public/css/oneui.css')
    .sass('resources/assets/sass/oneui/themes/amethyst.scss', 'public/css/themes/')
    .sass('resources/assets/sass/oneui/themes/city.scss', 'public/css/themes/')
    .sass('resources/assets/sass/oneui/themes/flat.scss', 'public/css/themes/')
    .sass('resources/assets/sass/oneui/themes/modern.scss', 'public/css/themes/')
    .sass('resources/assets/sass/oneui/themes/smooth.scss', 'public/css/themes/')

    /* JS */
    .js('resources/assets/js/laravel/app.js', 'public/js/laravel.app.js')
    .js('resources/assets/js/oneui/app.js', 'public/js/oneui.app.js')

    .js('resources/assets/js/laravel/client.js', 'public/js/client.js')

    /* Components */
    .ts('resources/assets/js/react/education/form-builder/index.tsx', 'public/js/education/form-builder.js')
    .ts('resources/assets/js/react/education/schedule-sessions/index.tsx', 'public/js/education/schedule-sessions.js')
    .ts('resources/assets/js/react/merchant/subscribe-plan/index.tsx', 'public/js/merchant/subscribe-plan.js')
    .ts('resources/assets/js/react/account/manage-availabilities/index.tsx', 'public/js/account/manage-availabilities.js')

    /* Pages JS */
    .js('resources/assets/js/laravel/pages/dashboard.js', 'public/js/pages/dashboard.js')
    .js('resources/assets/js/laravel/pages/live.js', 'public/js/pages/live.js')

    /* Tools */
    .browserSync('localhost:8000')
    .disableNotifications()

    /* Options */
    .options({
        processCssUrls: false
    });
