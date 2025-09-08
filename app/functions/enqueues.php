<?php

function register_dashboard_view($view) {
    $manifestTemp = (ENV['APP_ENV'] == 'development') ? 'temp/.vite/' : '';
    $manifest = json_decode(file_get_contents(__DIR__ . "/../static/admin/{$manifestTemp}manifest.json"));

    $staticDir = (ENV['APP_ENV'] == 'development') ? 'temp/' : '';
    $resource = "src/core/{$view}.ts";
    $resourceFileJs = $manifest->{$resource}->{'file'};
    $resourceFilesCss = $manifest->{$resource}->{'css'};

    AppHelper::register_assets('script', [
        'handle'    => "pandawp/script/$view",
        'src'       => get_theme_file_uri("/static/admin/{$staticDir}{$resourceFileJs}"),
        'deps'      => [],
        'ver'       => '1.0.0',
        'in_footer' => true
    ]);

    array_map(function ($file) use ($staticDir) {
        AppHelper::register_assets('style', [
            'handle'    => 'pandawp/style/' . $file,
            'src'       => get_theme_file_uri("/static/admin/{$staticDir}{$file}"),
            'deps'      => [],
            'ver'       => '1.0.0',
            'in_footer' => true
        ]);
    }, $resourceFilesCss);
}

add_action('wp_enqueue_scripts', function () {
    $manifestTemp   = (ENV['APP_ENV'] == 'development') ? 'temp/.vite/' : '';
    $manifest       = json_decode(file_get_contents(__DIR__ . "/../static/public/{$manifestTemp}manifest.json"));

    /**
     * --------------------------------------------------------------------------
     * Register Scripts
     * --------------------------------------------------------------------------
     *
     */
    array_map(function ($file) {
        if (!strpos($file, '.map')) {
            AppHelper::register_assets('script', [
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
        AppHelper::register_assets('style', [
            'handle'    => 'pandawp/style/' . $file,
            'src'       => get_theme_file_uri("/static/public/" . ((ENV['APP_ENV'] == 'development') ? "temp/{$file}" : "{$file}")),
            'deps'      => [],
            'ver'       => '1.0.0',
            'in_footer' => true
        ]);
    }, $manifest->{'index.html'}->{'css'});
});

add_action('admin_head', function () {
    $current = get_current_screen();

    switch ($current->base) {
        case 'toplevel_page_example': {
                register_dashboard_view('example');
            }
            break;
    }
});
