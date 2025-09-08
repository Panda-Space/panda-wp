<?php

class Apphelper {
    public static function register_assets(string $type, array $resource): void {
        if ($type === 'style') {
            wp_register_style(
                $resource['handle'],
                $resource['src'],
                $resource['deps'],
                $resource['ver'],
                isset($resource['media']) ? $resource['media'] : ''
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

    public static function autoload_files_by_folder(string $path): array {
        $finalPath = get_theme_file_path("/{$path}");
        $folder = scandir($finalPath);
        $files = [];

        foreach ( $folder as $key => $file ) {
            if (!in_array($file, ['.', '..', '.gitkeep'])) {
                $files[] = $file;
            }
        }

        return $files;
    }

    public static function autoload_folders_by_folder(string $path): array {
        $iterator = new FilesystemIterator(get_theme_file_path("/{$path}"));
        $folders = [];

        foreach ($iterator as $item) {
            if (!str_contains($item->getFilename(), 'core')) {
                $folders[] = $item->getFilename();
            }
        }

        return $folders;
    }
}
