<?php

add_filter('script_loader_tag', function($tag, $handle, $src) {
    if (strpos($handle, 'pandawp/script') !== false) {
        $cleanedSrc = esc_url($src);
        $tag = '<script type="module" src="' . $cleanedSrc . '"></script>';
    }

    return $tag;
}, 10, 3); 
