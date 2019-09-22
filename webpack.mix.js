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

mix.js('resources/js/shared/app.js', 'public/js/shared')
    .js('resources/js/admin/app.js', 'public/js/admin')
    .js('resources/js/auth/app.js', 'public/js/auth')
    .sass('resources/sass/shared/app.scss', 'public/css/shared')
    .sass('resources/sass/auth/app.scss', 'public/css/auth')
    .version();
