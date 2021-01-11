<?php

if (!isset($_SESSION['context'])) {
    session_start(); $_SESSION['context'] = [];
}

function setContextVariables($context = []) {
    $staticDir  = (ENV['STAGE'] == 'dev') ? '/temp/' : '';
    $context    = array_merge($context, [
        'nonce'     => wp_create_nonce( 'wp_rest' ),
        'api'       => get_rest_url() . "custom/v1",
        'assets'    => get_template_directory_uri() . "/static" . $staticDir,
        'vertion'   => ( require get_theme_file_path('config/base.php') )['vertion']
    ]);

    $_SESSION['context'] = array_merge($_SESSION['context'], $context);

    wp_localize_script('pandawp/script/main', 'panda', $_SESSION['context']);
}

function addContextVariables($context = []) {
    add_action( 'wp_enqueue_scripts', function () use ($context) {
        $_SESSION['context'] = array_merge($_SESSION['context'], $context);

        wp_localize_script('pandawp/script/main', 'panda', $_SESSION['context']);
    });
}

