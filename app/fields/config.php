<?php

/* Seeting Option Pages managed by ACF */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title'      => 'Información',
        'menu_title'      => 'Información',
        'menu_slug'       => 'options-contact',
        'redirect'        => false,
        'icon_url'        => 'dashicons-phone',
        'position'        => 3,
        'update_button'   => __('Actualizar', 'acf'),
        'updated_message' => __('Cambios guardados exitosamente', 'acf')
    ]);
}
