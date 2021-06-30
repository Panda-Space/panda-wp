<?php
/**
* Template Name: Template - About
*/

use Timber\Timber;

$context            = Timber::get_context();
$context['post']    = Timber::get_post();
$context['params']  = [
    'view' => 'about'
];

$context = array_merge( $context, (new \App\Controllers\PageController())->show(['type' => 'page', 'slug' => 'about'])->data );

addContextVariables($context);

Timber::render('app.twig', $context);
