<?php

use Timber\Timber;

$context = Timber::context();
$context['post'] = Timber::get_post();

Timber::render('app.twig', $context);
