<?php

function __getResourceURL($type, $resource){
    $staticDir  = (ENV['STAGE'] == 'dev') ? 'temp/' : '';

    if ($type == 'css') {
        return "/static/{$staticDir}css/{$resource}";
    } elseif ($type == 'js') {
        return "/static/{$staticDir}js/{$resource}";
    }
}

$assets_version = '1610266884563';
$config         = require get_theme_file_path('config/base.php');

function __enqueueGlobalPackges($config, $assets_version) {
    register_assets('package', [
        'handle'    => 'pandawp/base/vendors',
        'src'       => $config['resources']['vendors'],
        'deps'      => [ ],
        'ver'       => $assets_version,
        'in_footer' => true
    ]);
};

add_action( 'wp_enqueue_scripts', function () use ($config, $assets_version) {
    /**
     * --------------------------------------------------------------------------
     * Register Scripts
     * --------------------------------------------------------------------------
     *
     */
    __enqueueGlobalPackges($config, $assets_version);

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
    /* Silence is golden  */

    /**
     * --------------------------------------------------------------------------
     * Context variables
     * --------------------------------------------------------------------------
     *
     */
    setContextVariables();
});

add_action( 'admin_head', function() use ($config, $assets_version) {
    $current = get_current_screen();

    register_assets('style', [
        'handle' => 'pandawp/style/admin',
        'src'    => $config['resources']['style_admin'],
        'deps'   => [ ],
        'ver'    => $assets_version,
        'media'  => 'all'
    ]);

    switch ($current->base) {
        case 'toplevel_page_examples': {
                __enqueueGlobalPackges($config, $assets_version);

                register_assets('script', [
                    'handle'    => 'pandawp/wp/example',
                    'src'       =>  $config['resources']['wp_example'],
                    'deps'      => [ ],
                    'ver'       => $assets_version,
                    'in_footer' => true
                ]); 

                wp_localize_script( 'pandawp/script/main', 'panda', [
                    'nonce' => wp_create_nonce('wp_rest')
                ]);
            }
            break;
    }
});
