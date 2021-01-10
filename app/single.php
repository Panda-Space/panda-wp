<?php

use Timber\Timber;

$context            = Timber::get_context();
$context['post']    = Timber::get_post();

$context['post']->title;
$context['post']->thumbnail->src;
$context['post']->content;

addContextVariables($context);

Timber::render('single.twig', $context);
