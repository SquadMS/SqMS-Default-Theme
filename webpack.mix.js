const mix = require('laravel-mix');
const fs = require('fs');

/* Remove old build and restore required file structure */
if (fs.existsSync('public')) {
    fs.rmdirSync('public', { recursive: true });

    fs.mkdirSync('public');
    fs.mkdirSync('public/img');
}

/* Configure the public path */
mix.setPublicPath('public');

/* Build SCSS/JS assets */
mix.sass('resources/scss/app.scss', 'css/')
  .js('resources/js/app.js', 'js/')
  .version();

/* Copy static images */
mix.copyDirectory('resources/img/static', 'public/img');