<?php

use Timber\Timber;

$context          = Timber::get_context();
$context['post'] = Timber::get_post();

$context['banner'] = get_field('banner', $post->ID);
$context['form'] = get_field('form', $post->ID);
$context['shops'] = get_field('shops', $post->ID);
$context['countries'] = get_field_object('field_5eabc4a77fb93')['choices'];

Timber::render( 'home.twig', $context );
