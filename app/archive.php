<?php

use Timber\Timber;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$category               = $wp_query->queried_object;
$context                = Timber::get_context();
$context['category']    = $category;

$context['products'] = new \Timber\PostQuery([
    'post_type' => 'product',
    "posts_per_page" => 6,
    "paged" => $paged,    
    'tag' => $category->slug
]);

Timber::render( 'archive-products.twig', $context ); 

