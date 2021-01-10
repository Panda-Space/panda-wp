<?php

use Timber\Timber;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$context                = Timber::get_context();
$context['category']    = $wp_query->queried_object;

$context['products'] = new \Timber\PostQuery([
    'post_type'         => 'product',
    "posts_per_page"    => 6,
    "paged"             => $paged,
    'tag'               => $context['category']->slug
]);

if ($context['category']->parent == 0) {
    $context['series'] = Timber::get_terms([
        "taxonomy"  => "tax-product",
        "parent"    => $context['category']->term_id
    ]);

    $context['series'] = array_map(function($serie){ 
        return (object)[
            "link"  => $serie->link,
            "title" => $serie->title,
        ];
    }, $context['series']);
} else {
    $context['products'] = Timber::get_posts([
        'post_type'         => 'product',
        "posts_per_page"    => 6,
        "paged"             => $paged,
        'tax_query'         => array(
            array(
                'taxonomy'  => 'tax-product',
                'field'     => 'slug',
                'terms'     => $context['category']->slug
            )
        )
    ]);

    $context['products'] = array_map(function($product){ 
        return (object)[
            "link"      => $product->link,
            "title"     => $product->title,
            'thumbnail' => ($product->thumbnail) ? $product->thumbnail->src : '',
            'slug'      => $product->slug,
        ];
    }, $context['products']);
}

addContextVariables($context);

Timber::render('app.twig', $context); 

