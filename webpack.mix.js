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

mix.webpackConfig({
   resolve: {
      extensions: ['.js', '.vue'],
   },
   externals: {
      // vue: 'Vue',
      // 'vue-router': 'vue-router'
   }
});

mix.js('resources/js/home.js', 'public/js')
   .extract(['vue'])
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync('web701.test');