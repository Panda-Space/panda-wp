<?php

namespace App\Controllers;

use Timber\Timber;

class PageController {
    public function __construct() { }

    public function show($request) {
        $pageData = [];

        switch ($request['type']) {
            case 'page':
            case 'post-type':
                $post = Timber::get_post(['post_type' => $request['type-name'], 'name' => $request['slug']]);

                if ($post) $post->title;
                if ($post) $post->content;

                if ($post->thumbnail) $post->thumbnail->src;

                $pageData = [
                    'post' => $post
                ];

                $pageData = array_merge($pageData, $this::__getPageData($request['slug'], $post->ID));
                break;
        }

        return (object)[
            'message'   => 'Panda WP - SPA 🚀🔥🐼',
            'data'      => $pageData,
            'status'    => 200
        ];
    }

    private function __getPageData($slug, $postId) {
        $data = [];

        switch ($slug) {
            case 'about':
                $data = ['example' => 'Hi, Frrom Panda WP'];
                break;
        }

        return $data;
    }
}
