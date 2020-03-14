<?php

use Timber\Timber;

$context          = Timber::get_context();
$context['post'] = Timber::get_post();

$args_articles = [
    "post_type" => "post",
    "posts_per_page" => 4
];

$context['articles'] = new \Timber\PostQuery($args_articles);

Timber::render( 'home.twig', $context );
