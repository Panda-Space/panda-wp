<?php

add_filter('script_loader_tag', function($tag, $handle, $src) {
    if (strpos($handle, 'pandawp/script')) {
        return $tag;
    }

    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';

    return $tag;
}, 10, 3);
