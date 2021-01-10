<?php

use Timber\Timber;

add_action('wp_enqueue_scripts', function () {
    setContextVariables();
});

Routes::map('blog', function($routeParams) {
    $params = [
        'route' => $routeParams,
        'view'  => 'blog',
    ];

    Routes::load('app.php', $params, "", 200);
});

Routes::map('search', function($routeParams) {
    $params = [
        'route' => $routeParams,
        'view'  => 'search',
    ];

    Routes::load('app.php', $params, "", 200);
});
