<?php

require(__DIR__ . '/../models/Example.php');

class ExampleController {
    public function __construct() {
        add_action( 'rest_api_init', function () {
            register_rest_route( 'custom/v1', '/examples', array(
                'methods' => 'GET',
                'callback' => array($this, 'index'),
                'permission_callback' => function ($request) {
                    return ($request['_wpnonce']) ? true : false;
                }
            ));
        });
    }

    public function index($request) {
        $examples = Example::all();

        if(count($examples)){
            return new WP_REST_Response((object)[
                'message'   => 'Examples here!!!',
                'data'      => $examples
            ], 200);
        }else{
            return new WP_Error( 'no_examples', __('No examples found'), array( 'status' => 404 ) );
        }
    }
}
