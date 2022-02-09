<?php

use Timber\Timber;

Routes::map('example', function($routeParams) {
    $params = [
        'route' => $routeParams,
        'view'  => 'example',
    ];

    Routes::load('app.php', $params, "", 200);
});
