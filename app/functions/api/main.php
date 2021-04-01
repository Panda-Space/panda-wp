<?php

require_once(__DIR__ . "/config.php");
require_once(__DIR__ . "/database/main.php");

require_once(__DIR__ . "/app/models/Example.php");
require_once(__DIR__ . "/app/controllers/ExampleController.php");

require_once(__DIR__ . "/routes/Router.php");
require_once(__DIR__ . "/routes/ExampleRouter.php");

new ExampleRouter();
