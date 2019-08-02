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

mix.js('resources/js/web/app.js', 'public/js/web')
    .js('resources/js/user/app.js', 'public/js/user')
    .sass('resources/sass/web/app.scss', 'public/css/web')
    .sass('resources/sass/user/app.scss', 'public/css/user')
    .version();
