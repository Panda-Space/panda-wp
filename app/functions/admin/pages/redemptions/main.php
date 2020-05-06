<?php

class RedemptionsOptionPage {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }

    public function add_plugin_page() {
        if (current_user_can( 'manage_options' )) {
            add_menu_page(
                'Redemptions', // page_title
                'Redemptions', // menu_title
                'manage_options', // capability
                'redemptions', // menu_slug
                array( $this, 'create_admin_page' ), // function
                'dashicons-clipboard', // icon_url
                3 // position
            );
        } else {
            add_menu_page(
                'Redemptions', // page_title
                'Redemptions', // menu_title
                'editor', // capability
                'redemptions', // menu_slug
                array( $this, 'create_admin_page' ), // function
                'dashicons-clipboard', // icon_url
                3 // position
            );
        }
        
    }

    public function create_admin_page() {
        include_once __DIR__.'/../assets/enqueue.php';
        include_once __DIR__.'/view.php';
    }
    
}

if ( is_admin()) {
    $redemptions = new RedemptionsOptionPage();
}
