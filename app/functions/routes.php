<?php

use Timber\Timber;

Routes::map('example', function($routeParams) {
    $params = [
        'title' => 'Example',
        'route' => $routeParams,
        'view'  => 'example',
    ];

    Routes::load('app.php', $params, "", 200);
});
