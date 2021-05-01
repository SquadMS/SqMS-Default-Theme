const mix = require('laravel-mix');
const fs = require('fs');

/* Remove old build and restore required file structure */
if (fs.existsSync('public')) {
    fs.rmdirSync('public', { recursive: true });

    fs.mkdirSync('public');
    fs.mkdirSync('public/images');
}

/* Configure the public path */
mix.setPublicPath('public');

/* Build SCSS/JS assets */
mix
/* Public assets */
.sass('resources/scss/public/app.scss', 'css/public/')
.js('resources/js/public/app.js', 'js/public/')

/* Admin assets */
.sass('resources/scss/admin/app.scss', 'css/admin/')
.js('resources/js/admin/app.js', 'js/admin/')

.version();

/* Copy static images */
mix.copyDirectory('resources/images/static', 'public/static-images');