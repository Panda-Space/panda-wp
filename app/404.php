<?php

use Timber\Timber;

$context = Timber::get_context();

addContextVariables($context);

Timber::render('app.twig', $context);
