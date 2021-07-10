<?php

namespace App\Controllers;

use App\Models\Lead;

class LeadController {
    public function __construct() { }

    public function store($request) {
        $lead = new Lead();

        $lead->fullname = $request['fullname'];
        $lead->brand    = $request['brand'];
        $lead->email    = $request['email'];
        $lead->interest = $request['interest'];
        $lead->details  = $request['details'];

        $lead->save();

        if($lead){
            return (object)[
                'message'   => 'Lead saved!!!',
                'data'      => $lead,
                'status'    => 200
            ];
        }else{
            return (object)[
                'code'      => 'lead_not_saved',
                'message'   => 'Lead not saved',
                'status'    => 404
            ];
        }
    }
}
