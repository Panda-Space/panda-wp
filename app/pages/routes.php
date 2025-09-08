<?php

Routes::map('example_custom_page', function($routeParams) {
    $params = [
        'title' => 'Example Custom Page',
        'route' => $routeParams,
        'view'  => 'example_custom_page',
    ];

    Routes::load(APP_PATH . '/pages/main.php', $params, "", 200);
});
