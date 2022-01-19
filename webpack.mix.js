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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/manage.js', 'public/js')
    .js('resources/js/odometer.js', 'public/js')
    .js('resources/js/simulation.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/common.scss', 'public/css')
    .sass('resources/sass/manage.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/contact.scss', 'public/css')
    .options({
        processCssUrls: false
     });
