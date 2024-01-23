let mix = require('laravel-mix');

mix.browserSync('http://localhost:8000/')
mix.disableSuccessNotifications();

mix.sass('resources/assets/sass/global.scss', 'public/assets/css');