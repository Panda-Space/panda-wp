<?php

$assets_version = '1600498734431';
$config = require get_theme_file_path('config/base.php');

add_action( 'wp_enqueue_scripts', function () use ($config, $assets_version) {
    /**
     * --------------------------------------------------------------------------
     * Register Scripts
     * --------------------------------------------------------------------------
     *
     */
    register_assets('script', [
        'handle'    => 'pandawp/package/jquery',
        'src'       => $config['resources']['package_jquery']['cdn'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    register_assets('package', [
        'handle'    => 'pandawp/package/vue',
        'src'       => $config['resources']['package_vue'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    register_assets('package', [
        'handle'    => 'pandawp/package/vuex',
        'src'       => $config['resources']['package_vuex'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    register_assets('package', [
        'handle'    => 'pandawp/package/setimmediate',
        'src'       => $config['resources']['package_setimmediate'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);    

    register_assets('package', [
        'handle'    => 'pandawp/package/process',
        'src'       => $config['resources']['package_process'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);

    register_assets('package', [
        'handle'    => 'pandawp/package/aos',
        'src'       => $config['resources']['package_aos'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);
    
    register_assets('script', [
        'handle'    => 'pandawp/script/main',
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
        register_assets('package', [
            'handle'    => 'pandawp/package/dom7',
            'src'       => $config['resources']['package_dom7'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]); 

        register_assets('package', [
            'handle'    => 'pandawp/package/swiper',
            'src'       => $config['resources']['package_swiper'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);   

        register_assets('package', [
            'handle'    => 'pandawp/package/fancyapps',
            'src'       => $config['resources']['package_fancyapps'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);
    
        register_assets('script', [
            'handle'    => 'pandawp/js/script/galleries',
            'src'       => $config['resources']['script_galleries'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

        register_assets('script', [
            'handle'    => 'pandawp/js/page/home',
            'src'       => $config['resources']['page_home'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

    }elseif (is_page('404')){
        register_assets('script', [
            'handle'    => 'pandawp/js/page/404',
            'src'       => $config['resources']['page_404'],
            'deps'      => [ ],
            'ver'       => $assets_version,
            'in_footer' => true
        ]);

    }
});
