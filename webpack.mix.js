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

mix.setResourceRoot('/themes/sqms-default-theme');

/* Build SCSS/JS assets */
mix
/* Public assets */
.sass('resources/scss/public/app.scss', 'css/public/')
.sass("resources/scss/public/app-rtl.scss", "css/public/", {}, [
  require("rtlcss")(),
])
.js('resources/js/public/app.js', 'js/public/')
.js('resources/js/public/server-status-listener.js', 'js/public/')
.js('resources/js/public/webp.js', 'js/public/')

.version();

/* Copy static images */
mix.copyDirectory('resources/images/static', 'public/static-images');