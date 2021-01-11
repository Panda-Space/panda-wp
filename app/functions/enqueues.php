<?php

function __getResourceURL($type, $resource){
    $staticDir  = (ENV['STAGE'] == 'dev') ? 'temp/' : '';

    if ($type == 'css') {
        return "/static/{$staticDir}css/{$resource}";
    } elseif ($type == 'js') {
        return "/static/{$staticDir}js/{$resource}";
    }
}

$config = require get_theme_file_path('config/base.php');

function __enqueueGlobalPackages($config) {
    register_assets('package', [
        'handle'    => 'pandawp/base/vendors',
        'src'       => $config['resources']['vendors'],
        'deps'      => [ ],
        'ver'       => $config['vertion'],
        'in_footer' => true
    ]);
};

add_action( 'wp_enqueue_scripts', function () use ($config) {
    /**
     * --------------------------------------------------------------------------
     * Register Scripts
     * --------------------------------------------------------------------------
     *
     */
    __enqueueGlobalPackages($config);

    register_assets('script', [
        'handle'    => 'pandawp/script/main',
        'src'       => $config['resources']['script_main'],
        'deps'      => [ ],
        'ver'       => $config['vertion'],
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
        'ver'    => $config['vertion'],
        'media'  => 'all'
    ]);

    register_assets('style', [
        'handle' => 'pandawp/style/main',
        'src'    => $config['resources']['style_main'],
        'deps'   => [ ],
        'ver'    => $config['vertion'],
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
    /* Silence is golden  */

    /**
     * --------------------------------------------------------------------------
     * Context variables
     * --------------------------------------------------------------------------
     *
     */
    setContextVariables();
});

add_action( 'admin_head', function() use ($config) {
    $current = get_current_screen();

    register_assets('style', [
        'handle' => 'pandawp/style/admin',
        'src'    => $config['resources']['style_admin'],
        'deps'   => [ ],
        'ver'    => $config['vertion'],
        'media'  => 'all'
    ]);

    switch ($current->base) {
        case 'toplevel_page_examples': {
                __enqueueGlobalPackages($config);

                register_assets('script', [
                    'handle'    => 'pandawp/wp/example',
                    'src'       =>  $config['resources']['wp_example'],
                    'deps'      => [ ],
                    'ver'       => $config['vertion'],
                    'in_footer' => true
                ]); 

                wp_localize_script( 'pandawp/script/main', 'panda', [
                    'nonce' => wp_create_nonce('wp_rest')
                ]);
            }
            break;
    }
});
