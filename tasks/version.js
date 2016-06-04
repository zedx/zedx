module.exports = function (elixir, fs) {
    'use strict';

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

    elixir(function(mix) {

        /* Versioning */

        mix.version([
            'public/backend/css/styles.css',
            'public/backend/js/scripts.js',
            'public/frontend/css/styles.css',
            'public/frontend/js/scripts.js',
        ]);
    });
};
