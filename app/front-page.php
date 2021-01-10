<?php

use Timber\Timber;

$context            = Timber::get_context();
$context['post']    = Timber::get_post();

addContextVariables($context);

Timber::render('app.twig', $context);
