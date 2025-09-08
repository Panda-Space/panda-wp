<?php

add_filter('script_loader_tag', function($tag, $handle, $source) {
    if (strpos($handle, 'pandawp/script') !== false) {
        $cleanedSource = esc_url($source);
        $tag = '<script type="module" src="' . $cleanedSource . '"></script>';
    }

    return $tag;
}, 10, 3); 
