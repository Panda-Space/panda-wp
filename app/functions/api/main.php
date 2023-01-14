<?php

require_once(__DIR__ . "/config.php");
require_once(__DIR__ . "/database/main.php");

$appModels         = ['Example'];
$appControllers    = ['PageController', 'ExampleController'];
$appRoutes         = ['PageRouter', 'ExampleRouter'];

__importProviders('model', $appModels);
__importProviders('controller', $appControllers);
__importProviders('router', $appRoutes);
