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

        var _root = __dirname + "/assets/src/";

        /* Scripts */

        mix.scripts([
            'libs/jquery/jquery.min.js',
            'libs/bootstrap/bootstrap.min.js',
            'libs/ion.rangeslider/js/ion.rangeSlider.min.js',
            'libs/select2/select2.min.js',
            'libs/mustache.js/mustache.min.js',
            'libs/lazyYT/lazyYT.js',
            'libs/bootstrap.youtubepopup/bootstrap.youtubepopup.js',
            'libs/jquery-form/jquery.form.js',
            'libs/metisMenu/metisMenu.min.js',
            'libs/jquery.bxslider/jquery.bxslider.min.js',
            'js/reverseTable.js',
            'js/config.js',
            'js/zedx/ad.js',
            'js/zedx/cart.js',
            'js/zedx/action.js',
            'js/zedx/user.js',
        ], 'public/frontend/js/scripts.js', _root)

            // IE9
            .scripts([
                'libs/html5shiv/html5shiv.min.js',
                'libs/respond/respond.min.js'
            ], 'public/frontend/js/ie9.js', _root)

            /* Styles */

            .styles([
                'libs/bootswatch/flatly.min.css',
                'libs/font-awesome/css/font-awesome.min.css',
                'libs/ion.rangeslider/css/ion.rangeSlider.css',
                'libs/ion.rangeslider/css/ion.rangeSlider.skinNice.css',
                'libs/select2/select2.css',
                'libs/select2-bootstrap-css/select2-bootstrap.css',
                'libs/lazyYT/lazyYT.css',
                'libs/flag-icon-css/css/flag-icon.min.css',
                'libs/jquery.bxslider/jquery.bxslider.css',
                'css/bxslider-override.css',
                'css/social-icons.css',
                'css/select2-flatui.css',
                'css/colors.css',
                'css/errors.css',
                'css/avatar.css',
                'css/btn-file.css',
                'css/helpers.css',
                'css/ad.css',
                'css/radiocheck.css',
                'css/style.css',
            ], 'public/frontend/css/styles.css', _root)

            /* Copy Frontend Assets */

            .copy(_root + "img/", "public/build/frontend/img/")
            .copy(_root + "libs/font-awesome/fonts/", "public/build/frontend/fonts/")
            .copy(_root + "libs/select2/select2.png", "public/build/frontend/css/")
            .copy(_root + "libs/select2/select2-spinner.gif", "public/build/frontend/css/")
            .copy(_root + "libs/flag-icon-css/flags/", "public/build/frontend/flags")
            .copy(_root + "libs/ion.rangeslider/img/", "public/build/frontend/img/")
            .copy(_root + "libs/jquery.bxslider/img/", "public/build/frontend/img/");
    });
};
