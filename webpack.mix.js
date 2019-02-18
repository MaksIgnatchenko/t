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

mix.js([
    'resources/js/app.js',
], 'public/build/js/vendor.js')
    .js([
        'resources/js/admiry/app.js',
        'resources/js/menu.js',

    ], 'public/build/js/app.js')
    .sass('resources/sass/app.scss', 'public/build/css/vendor.css')
    .styles([
        'resources/css/admiry/style.css',
        'resources/css/admiry/icons.css',
        'resources/css/admiry/custom.css',
    ], 'public/build/css/app.css');
