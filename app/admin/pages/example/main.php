<?php

use Admin\Pages\Core\BasePage;

class ExamplePage extends BasePage {
    protected $settings = [
        'page_title' => 'Example',
        'menu_title' => 'Example',
        'capability' => 'manage_options',
        'slug' => 'example',
        'icon' => 'dashicons-groups',
        'position' => 3
    ];
}

new ExamplePage();

