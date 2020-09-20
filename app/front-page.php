<?php

use Timber\Timber;

$context                = Timber::get_context();
$context['post']        = Timber::get_post();
$context['products']    = [
    'Producto 1',
    'Producto 2'
];

Timber::render( 'home.twig', $context );
