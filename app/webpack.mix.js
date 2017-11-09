let mix = require('laravel-mix')

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
    .styles('resources/assets/css', 'public/css/app.css')
    .sass('resources/assets/sass/app.sass', 'public/css/style.css')
    .js('resources/assets/js/app.js', 'public/js/app.js')
    .js('resources/assets/js/common.js', 'public/js/app.js')
    .js('resources/assets/js/template.js', 'public/js/app.js')
    .js('resources/assets/js/sidebar.js', 'public/js/app.js')
    .js('resources/assets/js/account.js', 'public/js/app.js')
    .js('resources/assets/js/training.js', 'public/js/app.js')
    .js('resources/assets/js/utils/state-manager.js', 'public/js/app.js')
