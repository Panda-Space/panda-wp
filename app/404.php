<?php

use Timber\Timber;

$context = Timber::get_context();

$context['image404'] = (ENV['APP_ENV'] == 'development') ? 'temp/404.png' : '/404.png';

Timber::render('404.twig', $context);
