<?php

use App\Controllers\PageController;

class PageRouter {
    public function __construct()
    {
        add_action('rest_api_init', function () {
            register_rest_route('custom/v1', '/pages', array(
                'methods' => 'GET',
                'callback' => array($this, 'show'),
                'permission_callback' => function ($request) {
                    return ($request['_wpnonce'] || ENV['APP_ENV'] == 'dev') ? true : false;
                },
                'args'  => $this::__getArgs(['type', 'type-name', 'id', 'slug'])
            ));
        });
    }

    public function show($request) {
        $data = (new PageController())->show($request);

        return PandaRouter::__response($data);
    }

    private function __getArgs($selectedRules) {
        $rules = [
            'type' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'type-name' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'id' => [
                'required'          => false,
                'type'              => 'integer',
                'validate_callback' => function($param, $request, $key) {
                    return is_numeric($param) && $param > 0;
                },
            ],
            'slug' => [
                'required'          => false,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
        ];

        return $selectedRules
            ? array_intersect_key($rules, array_flip($selectedRules))
            : $rules;
    }
}
