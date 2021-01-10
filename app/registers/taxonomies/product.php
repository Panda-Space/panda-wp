<?php

function taxonomy_product() {
    $settings = [
        'name_taxonomy_plural'   => 'Categoria de productos',
        'name_taxonomy_Singular' => 'Categoria de producto',
        'name_register_taxonomy' => 'tax-product',
        'rewrite_slug'           => 'productos',
        'post_type'              => ['product'],
        'text_domain'            => 'pandawp'
    ];

    $labels = [
        'name'          => _x( $settings['name_taxonomy_plural'], 'Taxonomy General Name', $settings['text_domain'] ),
        'singular_name' => _x( $settings['name_taxonomy_Singular'], 'Taxonomy Singular Name', $settings['text_domain'] ),
        'menu_name'     => __( $settings['name_taxonomy_plural'], $settings['text_domain'] )
    ];

    $rewrite = [
        'slug'         => $settings['rewrite_slug'],
        'with_front'   => true,
        'hierarchical' => false,
    ];

    $args = [
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'show_in_rest'      => true,
        'rewrite'           => $rewrite,
    ];
    register_taxonomy( $settings['name_register_taxonomy'], $settings['post_type'], $args );
}
add_action( 'init', 'taxonomy_product', 0 );
