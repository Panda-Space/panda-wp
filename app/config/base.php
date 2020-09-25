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
         * Packages
         * */
        'package_jquery' => [
            'cdn' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'
        ],

        'package_vue' => get_theme_file_uri(__getResourceURL('js', 'package.vue.bundle.js')),

        'package_vuex' => get_theme_file_uri(__getResourceURL('js', 'package.vuex.bundle.js')),
        
        'package_fancyapps' => get_theme_file_uri(__getResourceURL('js', 'package.fancyapps.bundle.js')),

        'package_aos' => get_theme_file_uri(__getResourceURL('js', 'package.aos.bundle.js')),

        'package_dom7' => get_theme_file_uri(__getResourceURL('js', 'package.dom7.bundle.js')),

        'package_swiper' => get_theme_file_uri(__getResourceURL('js', 'package.swiper.bundle.js')),

        'package_setimmediate' => get_theme_file_uri(__getResourceURL('js', 'package.setimmediate.bundle.js')),

        'package_process' => get_theme_file_uri(__getResourceURL('js', 'package.process.bundle.js')),        

        /**
         * Styles
         * */
        'style_main' => get_theme_file_uri(__getResourceURL('css', 'main.css')),

        //Pages
        'page_home' => get_theme_file_uri(__getResourceURL('js', 'page-home.bundle.js')),

        'page_404' => get_theme_file_uri(__getResourceURL('js', 'page-404.bundle.js')),

        //Scripts
        'script_main' => get_theme_file_uri(__getResourceURL('js', 'main.bundle.js')),

        'script_galleries' => get_theme_file_uri(__getResourceURL('js', 'galleries.bundle.js'))
    ]
];
