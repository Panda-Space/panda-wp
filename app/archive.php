<?php

use Timber\Timber;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$context = Timber::get_context();

//Category (tax)
$category = $wp_query->queried_object;
$context['category'] = $category;

//Get Services
$arg_articles = [
    'post_type' => 'post',
    "posts_per_page" => 6,
    "paged" => $paged,    
    'tag' => $category->slug
];

$context['articles'] = new \Timber\PostQuery($arg_articles);

Timber::render( 'page-blog.twig', $context ); 

