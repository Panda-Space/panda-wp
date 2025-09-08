<?php

class Bootstrap {
    protected static $THEME_APP_PATH;

    public static function config(): void {
        self::$THEME_APP_PATH = get_theme_file_path();

        require_once(self::$THEME_APP_PATH . '/../vendor/autoload.php');

        self::setEnviromentVariables();
        self::loadCoreFiles();
        self::loadAdminPages();
        self::loadEnqueues();
        self::loadContentTypes();
        self::loadFilters();
    }

    private static function loadCoreFiles(): void {
        require_once(self::$THEME_APP_PATH . '/../api/main.php');
        require_once(self::$THEME_APP_PATH . '/helpers/AppHelper.php');
        require_once(self::$THEME_APP_PATH . '/pages/routes.php');
        require_once(self::$THEME_APP_PATH . '/config/setup.php');
        require_once(self::$THEME_APP_PATH . '/fields/config.php');
        require_once(self::$THEME_APP_PATH . '/plugins/main.php');
    }

    public static function setEnviromentVariables(): void {
        $dotenv = Dotenv\Dotenv::createImmutable(self::$THEME_APP_PATH . '/..');
        $dotenv->load();

        define('APP_PATH', self::$THEME_APP_PATH);
        define('ENV', $_ENV);
    }

    public static function loadAdminPages(): void {
        $adminPagesFolder = AppHelper::autoload_folders_by_folder('admin/pages');

        foreach($adminPagesFolder as $folder) {
            require_once get_theme_file_path("admin/pages/{$folder}/main.php");
        }
    }

    public static function loadContentTypes(): void {
        array_map(function ($file) {
            require_once get_theme_file_path("content_types/post_types/") . "{$file}";
        }, AppHelper::autoload_files_by_folder('/content_types/post_types'));

        array_map(function ($file) {
            require_once get_theme_file_path("content_types/taxonomies/") . "{$file}";
        }, AppHelper::autoload_files_by_folder('/content_types/taxonomies'));
    }

    public static function loadFilters(): void {
        array_map(function ($file) {
            require_once get_theme_file_path("filters/") . "{$file}";
        }, AppHelper::autoload_files_by_folder('/filters'));
    }

    public static function loadEnqueues(): void {
        require_once get_theme_file_path("functions/") . "enqueues.php";
    }
}
