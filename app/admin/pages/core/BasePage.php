<?php

namespace Admin\Pages\Core;

class BasePage {
    protected $settings;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }

    public function add_plugin_page() {
        if (current_user_can( 'manage_options' )) {
            add_menu_page(
                $this->settings['page_title'],
                $this->settings['menu_title'],
                $this->settings['capability'],
                $this->settings['slug'],
                array( $this, 'create_admin_page' ),
                $this->settings['icon'],
                $this->settings['position']
            );
        }
    }

    public function create_admin_page() {
        $folder = $this->settings['slug'];

        include_once APP_PATH . "/admin/pages/{$folder}/view.php";
    }
}
