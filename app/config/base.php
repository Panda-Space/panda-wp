<?php

$GOOGLE_API_KEY = '***************************************';
$FONTS_FAMILIES = 'Roboto:300,400,500,700';

return [
    'GOOGLE_API_KEY' => $GOOGLE_API_KEY,

    'resources' => [

        /**
         * Google
         * */
        'google_fonts' => 'https://fonts.googleapis.com/css?family=' . $FONTS_FAMILIES . '&display=swap',

        'google_maps' => 'https://maps.googleapis.com/maps/api/js?key=' . $GOOGLE_API_KEY . '&callback=initMap',

        /**
         * Fontawesome
         * */
        'fontawesome' => [
            'cdn' => [
                'base' => 'https://pandora-space-america.nyc3.digitaloceanspaces.com/statics/icons/5.6.3/js/fontawesome.min.js',
                'style' => 'https://pandora-space-america.nyc3.digitaloceanspaces.com/statics/icons/5.6.3/js/regular.min.js',
                'brands' => 'https://pandora-space-america.nyc3.digitaloceanspaces.com/statics/icons/5.6.3/js/brands.min.js'
            ]
        ],

        /**
         * Packages
         * */
        'package_jquery' => [
            'cdn' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',
            'local' => get_theme_file_uri('/static/js/libs/jquery/jquery.min.js')
        ],

        'package_foundation' => get_theme_file_uri('/static/js/package.foundation-sites.bundle.js'),

        'package_fancyapps' => get_theme_file_uri('/static/js/package.fancyapps.bundle.js'),

        'package_dom7' => get_theme_file_uri('/static/js/package.dom7.bundle.js'),

        'package_swiper' => get_theme_file_uri('/static/js/package.swiper.bundle.js'),

        /**
         * Styles
         * */
        'style_main' => get_theme_file_uri('/static/css/main.css'),

        /**
         * Scripts
         * */
        'script_main' => get_theme_file_uri('/static/js/main.bundle.js'),

        //Components
        'component_map' => get_theme_file_uri('/static/js/map.bundle.js'),

        'component_form' => get_theme_file_uri('/static/js/form.bundle.js'),

        //Pages
        /* Silence is golden */

        //Galleries
        'script_galleries' => get_theme_file_uri('/static/js/galleries.bundle.js'),

        //Sliders
        'sliders_home' => get_theme_file_uri('/static/js/sliders-home.bundle.js'),
    ]
];
