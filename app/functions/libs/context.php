<?php

if (!isset($_SESSION['context'])) {
    session_start(); $_SESSION['context'] = [];
}

function setContextVariables($context = []) {
    $context = array_merge($context, [
        'nonce' => wp_create_nonce( 'wp_rest' ),
        'api'   => get_rest_url() . "custom/v1",
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

