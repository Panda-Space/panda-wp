<?php

namespace App\Controllers;

use App\Models\Example;

class ExampleController {
    public function __construct() { }

    public function index($request) {
        $examples = Example::all();

        if(count($examples)){
            return (object)[
                'message'   => 'Examples here!!!',
                'data'      => $examples,
                'status'    => 200
            ];
        }else{
            return (object)[
                'code'      => 'examples_not_found',
                'message'   => 'No examples found',
                'status'    => 404
            ];
        }
    }
}
