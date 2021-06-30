<?php

use Timber\Timber;

$context            = Timber::get_context();
$context['post']    = Timber::get_post();
$context['params']  = [
    'view' => 'home'
];

addContextVariables($context);

Timber::render('app.twig', $context);
