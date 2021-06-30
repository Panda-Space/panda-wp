<?php

use Timber\Timber;

$context            = Timber::get_context();
$context['params']  = [
    'view' => $post->slug
];

addContextVariables($context);

Timber::render('app.twig', $context);
