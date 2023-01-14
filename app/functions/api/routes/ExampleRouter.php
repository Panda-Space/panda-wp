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
                    return true;
                },
                'args'  => $this->__getArgs(['id', 'email'])
            ));
        });
    }

    public function index($request) {
        try {
            $data = (new ExampleController())->index($request);

            return wp_send_json([
                'code'      => 200,
                'message'   => $data ? 'Example here!!' : 'No example here 😥',
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
            'id' => [
                'required'          => true,
                'type'              => 'integer',
                'validate_callback' => function($param, $request, $key) {
                    return is_numeric($param) && $param > 0;
                },
            ],
            'email' => [
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
