<?php

use App\Controllers\ExampleController;

class ExampleRouter {
    public function __construct()
    {
        add_action('rest_api_init', function () {
            register_rest_route('custom/v1', '/examples', array(
                'methods' => 'GET',
                'callback' => array($this, 'index'),
                'permission_callback' => function ($request) {
                    return ($request['_wpnonce']) ? true : false;
                }
            ));
        });
    }

    public function index($request) {
        $data = (new ExampleController())->index($request);

        return PandaRouter::__response($data);
    }
}
