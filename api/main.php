<?php

require_once(__DIR__ . "/config.php");
require_once(__DIR__ . "/database/main.php");

$appRoutes = ['PageRouter', 'ExampleRouter'];

__importProviders('router', $appRoutes);
