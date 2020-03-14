<?php

$assets_version = '1584165069383';
$config = require_once get_theme_file_path('config/base.php');

add_action( 'wp_enqueue_scripts', function () use ($config, $assets_version) {

    $fa = [
        'handle'    => 'pandawp/fontawesome/base',
        'src'       =>  $config['resources']['fontawesome']['cdn']['base'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ];

    /**
     * --------------------------------------------------------------------------
     * Register Scripts
     * --------------------------------------------------------------------------
     *
     */
    register_assets('script', [
        'handle'    => 'pandawp/package/jquery',
        'src'       => WP_DEBUG
            ? $config['resources']['package_jquery']['local']
            : $config['resources']['package_jquery']['cdn'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    register_assets('script', [
        'handle'    => 'pandawp/package/foundation',
        'src'       => $config['resources']['package_foundation'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    register_assets('script', [
        'handle'    => 'pandawp/js/main',
        'src'       => $config['resources']['script_main'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    /**
     * --------------------------------------------------------------------------
     * Register Styles
     * --------------------------------------------------------------------------
     *
     */
    register_assets('style', [
        'handle' => 'pandawp/google/font',
        'src'    => $config['resources']['google_fonts'],
        'deps'   => [ ],
        'ver'    => $assets_version,
        'media'  => 'all'
    ]);

    register_assets('style', [
        'handle' => 'pandawp/style/main',
        'src'    => $config['resources']['style_main'],
        'deps'   => [ ],
        'ver'    => $assets_version,
        'media'  => 'all'
    ]);

    /**
     * --------------------------------------------------------------------------
     * Register Fontawesome
     * --------------------------------------------------------------------------
     *
     */
    wp_register_script($fa['handle'], $fa['src'], $fa['deps'], $fa['ver'], $fa['in_footer']);

    register_assets('script', [
        'handle'    => 'pandawp/fontawesome/style',
        'src'       => $config['resources']['fontawesome']['cdn']['style'],
        'deps'      => [ $fa['handle'] ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    register_assets('script', [
        'handle'    => 'pandawp/fontawesome/brands',
        'src'       => $config['resources']['fontawesome']['cdn']['brands'],
        'deps'      => [ $fa['handle'] ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    /**
     * --------------------------------------------------------------------------
     * Register google maps script
     * --------------------------------------------------------------------------
     *
     */
    /* GMaps here */

    /**
     * --------------------------------------------------------------------------
     * Register Scripts with conditionals
     * --------------------------------------------------------------------------
     *
     */
    if ( is_front_page() ) {
        register_assets('script', [
            'handle'    => 'pandawp/package/fancyapps',
            'src'       => $config['resources']['package_fancyapps'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

        register_assets('script', [
            'handle'    => 'pandawp/package/swiper',
            'src'       => $config['resources']['package_swiper'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

        register_assets('script', [
            'handle'    => 'pandawp/package/dom7',
            'src'       => $config['resources']['package_dom7'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

        register_assets('script', [
            'handle'    => 'pandawp/js/galleries',
            'src'       => $config['resources']['script_galleries'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

        register_assets('script', [
            'handle'    => 'pandawp/js/sliders/home',
            'src'       => $config['resources']['sliders_home'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);
        
    }elseif (is_page('contacto')){
        register_assets('script', [
            'handle'    => 'pandawp/js/component/form',
            'src'       => $config['resources']['component_form'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

        register_assets('script', [
            'handle'    => 'pandawp/js/component/map',
            'src'       => $config['resources']['component_map'],
            'deps'      => [],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);
    
        register_assets('script', [
            'handle'    => 'api-google-maps',
            'src'       => $config['resources']['google_maps'],
            'deps'      => [],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);        
    }
});
