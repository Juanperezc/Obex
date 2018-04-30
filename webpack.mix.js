
const { mix } = require('laravel-mix');

mix.copy('resources/assets/sass/patterns', 'public/css');
mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts')
mix.copy('resources/assets/images', 'public/images'); ///
mix.combine([
    'resources/assets/vendor/bootstrap/css/bootstrap.css',
    'resources/assets/vendor/animate/animate.css',
    'resources/assets/vendor/font-awesome/css/font-awesome.css',
], 'public/css/vendor.css', './');
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
  mix.combine([
    'resources/assets/vendor/jquery/jquery-3.1.1.min.js',
    'resources/assets/vendor/bootstrap/js/bootstrap.js',
    'resources/assets/vendor/metisMenu/jquery.metisMenu.js',
    'resources/assets/vendor/slimscroll/jquery.slimscroll.min.js',
    'resources/assets/vendor/pace/pace.min.js'
], 'public/js/main.js', './');
/*mix.autoload({
  jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});*/


