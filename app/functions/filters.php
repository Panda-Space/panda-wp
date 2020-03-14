<?php

use Timber\Timber;

add_filter('script_loader_tag', function($tag, $handle) {
    if ( 'api-google-maps' !== $handle )
        return $tag;
    return str_replace( ' src', ' async defer src', $tag );
}, 10, 2);

add_filter('timber/context', function($context) {
    $context['primary_menu'] = new \Timber\Menu( 'primary-menu' );
    $context['footer_menu']  = new \Timber\Menu( 'footer-menu' );
    $context['social_menu']  = new \Timber\Menu( 'social-menu' );

    $context['information']  = get_option('information_page');

    return $context;
});
