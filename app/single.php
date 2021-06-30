<?php

use Timber\Timber;

$context            = Timber::get_context();
$context['post']    = Timber::get_post();
$context['params']  = [
    'view' => $post->slug
];

$context = array_merge( $context, (new \App\Controllers\PageController())->show([
        'type' => 'post-type',
        'type-name' => $post->post_type,
        'slug' => $post->slug
    ])->data);

addContextVariables($context);

Timber::render('single.twig', $context);
