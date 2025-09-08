<?php

/* Setting GOOLE_API_KEY to ACF Google Maps */
if (isset(ENV['GOOGLE_API_KEY'])) {
    add_filter('acf/fields/google_map/api', function($api) {
        $api['key'] = ENV['GOOGLE_API_KEY'];

        return $api;
    });
}

/* Save fields JSON */
add_filter('acf/settings/save_json', function ($path) {
    $path = get_theme_file_path('/fields');

    return $path;
});

/* Load fields JSON */
add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);

    $paths[] = get_theme_file_path('/fields');

    return $paths;
});
