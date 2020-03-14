<?php

use Timber\Timber;


$text = $_GET['s'];
$args = [
    's' => $text
];

$context           = Timber::get_context();
$context['result'] = get_search_query();
$context['post']   = Timber::get_post();
$context['posts']  = Timber::get_posts($args);

Timber::render( 'search.twig', $context );
