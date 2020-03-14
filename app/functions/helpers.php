<?php


/**
 * --------------------------------------------------------------------------
 * Helper | register_assets();
 * --------------------------------------------------------------------------
 *
 * @param $type
 * @param $resource
 *
 */
function register_assets($type, $resource) {
    if ($type === 'style') {
        wp_register_style(
            $resource['handle'],
            $resource['src'],
            $resource['deps'],
            $resource['ver'],
            $resource['media']
        );
        wp_enqueue_style( $resource['handle'] );
    } elseif ($type === 'script') {
        wp_register_script(
            $resource['handle'],
            $resource['src'],
            $resource['deps'],
            $resource['ver'],
            $resource['in_footer']
        );
        wp_enqueue_script( $resource['handle'] );
    }
}


/**
 * --------------------------------------------------------------------------
 * Helper | dd();
 * --------------------------------------------------------------------------
 *
 * @param $variable
 *
 */
function dd($variable) {
    $styles = "
    #dd {
        background-color: black;
        color: #fff;
    }
    #dd small {
        color: #fff000;
    }
    ";

    echo "<div id='dd'><pre>";
    echo "<style>{$styles}</style>";
    var_dump($variable);
    echo "</pre></div>";
}


/**
 * --------------------------------------------------------------------------
 * Helper | File version
 * --------------------------------------------------------------------------
 *
 * @param string $version_file
 *
 * @return int|string
 *
 */
function file_version ( $version_file = '0.0.1' ) {
    return WP_DEBUG ? time() : $version_file;
}


/**
 * --------------------------------------------------------------------------
 * Helper | Autoload functions custom post type or taxonomy
 * --------------------------------------------------------------------------
 *
 * @param string $path
 *
 * @return array
 *
 */
function __autoload_functions_by_dir(String $path) {
    $dir = scandir(get_template_directory() . $path);
    $files = [];

    foreach ( $dir as $key => $file ) {
        if ( ! in_array($file, ['.', '..', '.gitkeep']) ) {
            $files[] = substr($file, 0, -4);
        }
    }

    return $files;
}
