<?php

function __getResourceURL($type, $resource) {
    $manifestTemp   = (ENV['APP_ENV'] == 'development') ? 'temp/' : '';
    $manifest       = json_decode(file_get_contents(__DIR__ . "/../static/admin/{$manifestTemp}manifest.json"));

    $staticDir      = (ENV['APP_ENV'] == 'development') ? 'temp/' : '';
    $resourceFile   = $manifest->{$resource}->{'file'};

    if ($type == 'css') {
        return get_theme_file_uri("/static/admin/{$staticDir}{$resourceFile}");
    } elseif ($type == 'js') {
        return get_theme_file_uri("/static/admin/{$staticDir}{$resourceFile}");
    }
}

add_action('wp_enqueue_scripts', function () {
    $manifestTemp   = (ENV['APP_ENV'] == 'development') ? 'temp/' : '';
    $manifest       = json_decode(file_get_contents(__DIR__ . "/../static/public/{$manifestTemp}manifest.json"));

    /**
     * --------------------------------------------------------------------------
     * Register Scripts
     * --------------------------------------------------------------------------
     *
     */
    array_map(function ($file) {
        if (!strpos($file, '.map')) {
            register_assets('script', [
                'handle'    => 'pandawp/script/' . $file,
                'src'       => get_theme_file_uri('/static/public/' . ((ENV['APP_ENV'] == 'development') ? "temp/{$file}" : "{$file}")),
                'deps'      => [],
                'ver'       => '1.0.0',
                'in_footer' => true
            ]);
        }
    }, [$manifest->{'index.html'}->{'file'}]);

    /**
     * --------------------------------------------------------------------------
     * Register Styles
     * --------------------------------------------------------------------------
     *
     */
    array_map(function ($file) {
        register_assets('style', [
            'handle'    => 'pandawp/style/' . $file,
            'src'       => get_theme_file_uri("/static/public/" . ((ENV['APP_ENV'] == 'development') ? "temp/{$file}" : "{$file}")),
            'deps'      => [],
            'ver'       => '1.0.0',
            'in_footer' => true
        ]);
    }, [$manifest->{'index.css'}->{'file'}]);
});

add_action('admin_head', function () {
    $current = get_current_screen();

    switch ($current->base) {
        case 'toplevel_page_examples': {
                register_assets('style', [
                    'handle'    => 'pandawp/style/example',
                    'src'       => __getResourceURL('js', 'src/core/example.css'),
                    'deps'      => [],
                    'ver'       => '1.0.0',
                    'media'     => 'all'
                ]);

                register_assets('script', [
                    'handle'    => 'pandawp/script/example',
                    'src'       => __getResourceURL('js', 'src/core/example.ts'),
                    'deps'      => [],
                    'ver'       => '1.0.0',
                    'in_footer' => true
                ]);
            }
            break;
    }
});
