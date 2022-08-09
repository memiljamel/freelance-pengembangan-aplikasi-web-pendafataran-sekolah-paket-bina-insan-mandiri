const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/admin/sb-admin-2.js', 'public/js/admin')
    .js('resources/js/admin/app.js', 'public/js/admin')
    .js('resources/js/admin/datatables-demo.js', 'public/js/admin')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/bootstrap.css', 'public/css')
    .postCss('resources/css/admin/fontawesome-free.css', 'public/css/admin')
    .postCss('resources/css/admin/sb-admin-2.css', 'public/css/admin')
    .postCss('resources/css/admin/dataTables.bootstrap4.css', 'public/css/admin')
    .version()
    .browserSync('http://localhost:8000')
    .disableNotifications();
