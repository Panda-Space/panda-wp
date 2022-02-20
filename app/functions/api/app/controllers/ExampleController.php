<?php

namespace App\Controllers;

use App\Models\Example;
use Exception;

class ExampleController {
    public function __construct() { }

    public function index($request) {
        $examples = Example::all();

        if (count($examples)) {
            return (object)[
                'message'   => 'Examples here!!!',
                'data'      => $examples,
                'status'    => true,
                'code'      => 200
            ];
        } else {
            throw new Exception('No examples found');
        }
    }
}
