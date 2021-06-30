<?php

use Timber\Timber;

add_filter('script_loader_tag', function($tag, $handle) {
    if ( 'api-google-maps' !== $handle )
        return $tag;
    return str_replace( ' src', ' async defer src', $tag );
}, 10, 2);

add_filter('timber/context', function($context) {
    $context['social_menu']  = new \Timber\Menu( 'social-menu' );

    $primaryMenu    = new \Timber\Menu( 'primary-menu' );
    $footerMenu     = new \Timber\Menu( 'footer-menu' );

    $primaryMenu->items = array_map(function($item) {
        $url = explode('/', $item->url);
        $url = array_filter($url, function($element){ return $element != ''; });

        $item->slug = end($url);
        $item->url  = '/' . $item->slug;

        return $item;
    }, $primaryMenu->items);

    $footerMenu->items = array_map(function($item) {
        $url = explode('/', $item->url);
        $url = array_filter($url, function($element){ return $element != ''; });

        $item->slug = end($url);
        $item->url  = '/' . $item->slug;

        return $item;
    }, $footerMenu->items);

    $context['primary_menu'] = $primaryMenu;
    $context['footer_menu']  = $footerMenu;

    /*
    $context['information']  = (object)[
        "phone" => get_field('phone', 'options'),
        "email" => get_field('email', 'options')
    ];
    */

    return $context;
});
