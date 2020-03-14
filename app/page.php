<?php

use Timber\Timber;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$context         = Timber::get_context();
$context['post'] = Timber::get_post();

if(is_page('blog')){
    $args_articles = [
        "post_type" => "post",
        "posts_per_page" => 6,
        "paged" => $paged
    ];

    $context['articles'] = new \Timber\PostQuery($args_articles);
}

$templates = [
    'page-' . $post->post_name . '.twig',
    'page.twig'
];

Timber::render( $templates, $context );
