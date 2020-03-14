<?php

$config = require_once get_theme_file_path('config/base.php');

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

    $pm_general_information = acf_add_options_page([
        'page_title'      => 'Información General',
        'menu_title'      => 'Información General',
        'menu_slug'       => 'options-general',
        'redirect'        => false, // true
        'icon_url'        => 'dashicons-performance',
        'update_button'   => __('Actulizar', 'acf'),
        'updated_message' => __('Cambios Guardados exitosamente', 'acf')
    ]);

    acf_add_options_sub_page([
        'page_title' 	  => 'Configuracion de contacto',
        'menu_title' 	  => 'Contacto',
        'menu_slug'       => 'options-contact',
        'post_id'         => 'options-contact',
        'parent_slug' 	  => $pm_general_information['menu_slug'],
        'update_button'   => __('Actulizar', 'acf'),
        'updated_message' => __('Cambios Guardados exitosamente', 'acf')
    ]);
}
