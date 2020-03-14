<?php

use Timber\Timber;

$context         = Timber::get_context();
$context['post'] = Timber::get_post();

$templates = [
    'single-' . $post->post_type . '.twig',
    'single.twig'
];

$args_other_articles = [
    "post_type" => "post",
    "posts_per_page" => 3,
    "post__not_in" => [$post->ID],
    "orderby" => "rand"
];

$context['other_articles'] = new \Timber\PostQuery($args_other_articles);

Timber::render( $templates, $context );
