<?php

use Timber\Timber;


$context = Timber::get_context();

Timber::render( '404.twig', $context );
