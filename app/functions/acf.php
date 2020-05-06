<?php

$config = require get_theme_file_path('config/base.php');

/**
 * --------------------------------------------------------------------------
 * ACF | Google maps - Set API KEY
 * --------------------------------------------------------------------------
 *
 * */
add_filter('acf/fields/google_map/api', function($api) use ($config) {
    $api['key'] = $config['GOOGLE_API_KEY'];

    return $api;
});

/**
 * --------------------------------------------------------------------------
 * ACF | Save fields JSON
 * --------------------------------------------------------------------------
 *
 * */
add_filter('acf/settings/save_json', function ($path) {
    $path = get_theme_file_path('/fields');

    return $path;
});

/**
 * --------------------------------------------------------------------------
 * ACF | Load fields JSON
 * --------------------------------------------------------------------------
 *
 * */
add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);

    $paths[] = get_theme_file_path('/fields');

    return $paths;
});

/**
 * --------------------------------------------------------------------------
 * Options page
 * --------------------------------------------------------------------------
 *
 * */
if( function_exists('acf_add_options_page') ) {
    $pm_information = acf_add_options_page([
        'page_title'      => 'Información',
        'menu_title'      => 'Información',
        'menu_slug'       => 'options-contact',
        'position'       => 3,        
        'redirect'        => false, // true
        'icon_url'        => 'dashicons-performance',
        'update_button'   => __('Actulizar', 'acf'),
        'updated_message' => __('Cambios Guardados exitosamente', 'acf')
    ]);
}
