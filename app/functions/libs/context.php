<?php

// FIXME: deprectated

function getContextVariables($context = []) {
    $staticDir  = (ENV['APP_ENV'] == 'development') ? '/admin/temp/' : '/admin';
    $context    = array_merge($context, [
        'site'      => get_site_url(),
        'nonce'     => wp_create_nonce( 'wp_rest' ),
        'api'       => get_rest_url() . "custom/v1",
        'assets'    => get_template_directory_uri() . "/static" . $staticDir,
        'vertion'   => '1.0.0'
    ]);

    return $context;
}

