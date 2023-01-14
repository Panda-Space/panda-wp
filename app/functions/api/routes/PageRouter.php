<?php

use App\Controllers\PageController;

class PageRouter {
    public function __construct()
    {
        add_action('rest_api_init', function () {
            register_rest_route('custom/v1', '/pages/(?P<slug>[a-zA-Z0-9-]+)', array(
                'methods' => 'GET',
                'callback' => array($this, 'show'),
                'permission_callback' => function ($request) {
                    return true;
                },
                'args'  => $this->__getArgs(['type', 'type-name'])
            ));
        });
    }

    public function show($request) {
        try {
            $data = (new PageController())->show($request);

            return wp_send_json([
                'code'      => 200,
                'message'   => $data ? 'Panda WP content here!!' : 'No Panda WP content 😥',
                'data'      => $data,
                'status'    => $data ? true : false
            ], 200);
        } catch (Exception $e) {
            return wp_send_json([
                'code'      => $e->getCode() ?? 502,
                'message'   => $e->getMessage(),
                'status'    => false
            ], $e->getCode() ?? 502);
        }
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
                'required'          => false,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ]
        ];

        return $selectedRules
            ? array_intersect_key($rules, array_flip($selectedRules))
            : $rules;
    }
}
