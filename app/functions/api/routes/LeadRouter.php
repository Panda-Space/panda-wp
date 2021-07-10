<?php

use App\Controllers\LeadController;

class LeadRouter {
    public function __construct()
    {
        add_action('rest_api_init', function () {
            register_rest_route('custom/v1', '/leads', array(
                'methods' => 'POST',
                'callback' => array($this, 'store'),
                'permission_callback' => function ($request) {
                    return ($request['_wpnonce'] || ENV['APP_ENV'] == 'dev') ? true : false;
                },
                'args'  => $this::__getArgs(['brand', 'fullname', 'email', 'interest', 'details'])
            ));
        });
    }

    public function store($request) {
        $data = (new LeadController())->store($request);

        return PandaRouter::__response($data);
    }

    private function __getArgs($selectedRules) {
        $rules = [
            'brand' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'fullname' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'email' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'interest' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'details' => [
                'required'          => true,
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
