<?php

namespace App\Controllers;

use Timber\Timber;
use Exception;

class PageController {
    public function __construct() { }

    public function show($request) {
        switch ($request['type']) {
            case 'page':
            case 'post-type':
                $post = Timber::get_post([
                    'post_type' => ($request['type'] == 'post-type')
                        ? $request['type-name']
                        : 'page',
                    'name' => $request['slug']
                ]);

                if ($post) {
                    $post->title;
                    $post->content;

                    if ($post->thumbnail) $post->thumbnail->src;

                    $pageData = [
                        'post' => $post
                    ];

                    $pageData = array_merge($pageData, $this->__getPostData($request['type'], $request['type-name'], $request['slug'], $post->ID));
                } else {
                    $pageData = false;
                }

                break;

            case 'term':
                $terms = Timber::get_terms([
                    'taxonomy'  => $request['type-name'],
                    'slug'      => $request['slug']
                ]);
                $term = count($terms) ? $terms[0] : false;

                if ($term) {
                    $term->title;

                    $pageData = [
                        'term' => $term
                    ];

                    $pageData = array_merge($pageData, $this->__getTermData($request['type-name'], $request['slug'], $term->ID, $request['parent']));
                } else {
                    $pageData = false;
                }
                break;
            case 'general':
                $pageData = $this->__getGeneralData();
                break;
        }

        if ($pageData) {
            return $pageData;
        } else {
            return false;
        }
    }

    private function __getPostData($objectType, $objectTypeName, $postSlug, $objectId) {
        $data = [];

        switch ($objectType) {
            case 'post-type':
                switch ($objectTypeName) {
                    case 'example':
                        $data = ['example' => 'Hi, From Panda WP'];
                        break;
                }
                break;

            case 'page':
                switch ($postSlug) {
                    case 'example':
                        $data = ['articles' => Timber::get_posts(['post_type' => 'post'])];
                        break;
                }
                break;
        }

        return $data;
    }

    private function __getTermData($objectTypeName, $postSlug, $objectId, $parent) {
        $data = [];

        switch ($objectTypeName) {
            case 'example':
                if ($parent) {
                    /* subcategory */
                } else {
                    /* category */
                }

                $data = ['example' => 'Hi, From Panda WP'];
                break;
        }

        return $data;
    }

    private function __getGeneralData() {
        $primaryMenu    = Timber::get_menu('primary-menu');
        $footerMenu     = Timber::get_menu('footer-menu');

        if (isset($primaryMenu->items)) {
            $primaryMenu->items = array_map(function($item) {
                $item->url  = $item->path();
                $item->name = $item->title();

                return $item;
            }, $primaryMenu->items);
        }

        if (isset($footerMenu->items)) {
            $footerMenu->items = array_map(function($item) {
                $item->url  = $item->path();
                $item->name = $item->title();

                return $item;
            }, $footerMenu->items);
        }

        return [
            'information' => (object)[
                /* ACF queries */
                // "phone" => get_field('phone', 'options'),
                // "email" => get_field('email', 'options')
            ],
            'primary_menu'  => $primaryMenu->items ?? [],
            'footer_menu'   => $footerMenu->items ?? []
        ];
    }
}
