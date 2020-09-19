<?php

require_once( __DIR__ . '/../vendor/autoload.php' );

/**
 * --------------------------------------------------------------------------
 * Functions
 * --------------------------------------------------------------------------
 *
 */
array_map(function ($file) {
    require_once get_theme_file_path("functions/") . "{$file}.php";
}, ['helpers', 'setup', 'enqueues', 'filters', 'acf', 'login', 'api/main']);

// array_map(function ($file) {
//     require_once get_theme_file_path("functions/") . "{$file}.php";
// }, ['admin/pages/example/main']);

/**
 * --------------------------------------------------------------------------
 * Post Types
 * --------------------------------------------------------------------------
 *
 */
array_map(function ($file) {
    require_once get_theme_file_path("registers/post-types/") . "{$file}.php";
}, __autoload_functions_by_dir('/registers/post-types'));


/**
 * --------------------------------------------------------------------------
 * Taxonomies
 * --------------------------------------------------------------------------
 *
 */
array_map(function ($file) {
    require_once get_theme_file_path("registers/taxonomies/") . "{$file}.php";
}, __autoload_functions_by_dir('/registers/taxonomies'));

