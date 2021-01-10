<?php

use Timber\Timber;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$context            = Timber::get_context();
$context['params']  = $params;

switch ($params['view']) {
    case 'blog':
        $arguments      = [
            'post_type' => 'post',
            'posts_per_page' => 1,
            'paged' => $paged
        ];

        $articlesArray  = [];
        $articles       = new \Timber\PostQuery($arguments);

        foreach($articles as $key => $value) {
            array_push(
                $articlesArray,
                [
                    'title'     => $value->title,
                    'thumbnail' => $value->thumbnail,
                    'slug'      => $value->slug,
                    'link'      => $value->link,
                ]
            );
        }

        $context['articles']    = $articlesArray;
        $context['pagination']  = $articles->pagination($arguments);
        break;

    case 'search':
        $context           = Timber::get_context();
        $context['result'] = get_search_query();
        $context['post']   = Timber::get_post();
        $context['posts']  = Timber::get_posts([
            's' => $_GET['s']
        ]);

        $context['posts'] = array_map(function($serie){ 
            return (object)[
                "link"  => $serie->link,
                "title" => $serie->title,
            ];
        }, $context['posts']);
        break;
}

addContextVariables($context);

Timber::render('app.twig', $context);
