var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.styles([
        'bootstrap.css',
        'jquery-ui.css',
        'font-awesome.css',
        'theme-style.css',
        'custom-style.css'
    ]);

    mix.scripts([
        'meiomask_modificado.js',
        'script.js',
        'functions.js'
    ]);

    /*
    bootstrap.css

    jquery-ui.min.css
    font-awesome.min.css
    theme-style.min.css
    custom-style.css
    plugins/animate/animate.css
    plugins/flag-icon-css/css/flag-icon.min.css*/

});
