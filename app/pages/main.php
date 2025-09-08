<?php

use Timber\Timber;

$context = Timber::context();
$context['params'] = $params;

switch ($params['view']) {
    case 'example_custom_page':
        /* Custom queries for add more information to $context */
        break;
}

Timber::render('app.twig', $context);
