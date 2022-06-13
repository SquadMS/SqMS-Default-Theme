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
.sass('resources/scss/public/app.scss', 'public/css')
.sass("resources/scss/public/app-rtl.scss", "public/css", {}, [
  require("rtlcss")(),
])
.options({
  postCss: [
      require('postcss-import'),
      require('tailwindcss')('./tailwind.config.js'),
      require('autoprefixer'),
  ],
})

.version();

/* Copy static images */
mix.copyDirectory('resources/images/static', 'public/static-images');