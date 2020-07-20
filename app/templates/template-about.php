<?php
/**
* Template Name: Template - About
*/

use Timber\Timber;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$context         = Timber::get_context();
$context['post'] = Timber::get_post();

Timber::render('page.twig', $context);
