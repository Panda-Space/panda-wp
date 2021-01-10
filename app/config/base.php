<?php

$GOOGLE_API_KEY = '***************************************';
$FONTS_FAMILIES = 'Mulish:wght@400;500;600;700;800'; /* Should be empty for non used */

return [
    'GOOGLE_API_KEY' => $GOOGLE_API_KEY,

    'resources' => [
        /**
         * Google
         * */
        'google_fonts'  => ($FONTS_FAMILIES) ? 'https://fonts.googleapis.com/css?family=' . $FONTS_FAMILIES . '&display=swap' : '',
        'google_maps'   => 'https://maps.googleapis.com/maps/api/js?key=' . $GOOGLE_API_KEY . '&callback=initMap',

        /**
         * Packages
         * */
        'vendors'           => get_theme_file_uri(__getResourceURL('js', 'vendors.bundle.js')),
        'package_jquery'    => [
            'cdn' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'
        ],

        /**
         * Styles
         * */
        'style_main'    => get_theme_file_uri(__getResourceURL('css', 'main.css')),
        'style_admin'   => get_theme_file_uri(__getResourceURL('css', 'wp_admin.css')),

        /**
         * Scripts
         * */
        'wp_example' => get_theme_file_uri(__getResourceURL('js', 'wp_example.bundle.js')),

        'script_main'       => get_theme_file_uri(__getResourceURL('js', 'main.bundle.js')),
    ]
];
