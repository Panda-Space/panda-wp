<?php

require(__DIR__ . '/../models/TicketModel.php');

class TicketController {
    public function __construct() {
        add_action( 'rest_api_init', function () {
            register_rest_route( 'custom/v1', '/tickets', array(
                'methods' => 'POST',
                'callback' => array($this, 'store')
            ));

            register_rest_route( 'custom/v1', '/tickets', array(
                'methods' => 'GET',
                'callback' => array($this, 'getByPage')
            ));

            register_rest_route( 'custom/v1', '/tickets/download', array(
                'methods' => 'GET',
                'callback' => array($this, 'downloadTickets')
            ));
        });
    }

    public function store($request) {
        $tickets = TicketModel::save($request);

        if ($tickets) {
            return new WP_REST_Response((object)[
                "message" => "Tickets saved succesfully"
            ]);
        } else {
            return new WP_Error( 'no_tickets_saved', __('No tickets saved'), array( 'status' => 500 ) );
        }
    }

    public function getByPage($request) {
        $tickets = [];

        if (!isset($request['page']) || $request['page'] == 1) {
            $tickets = TicketModel::getByPage(1);
        } else {
            $tickets = TicketModel::getByPage($request['page']);
        }

        if (!empty($tickets)) {
            return new WP_REST_Response((object)[
                "message" => "Tickets here!!",
                "data" => $tickets
            ]);
        } else {
            return new WP_Error( 'no_tickets_saved', __('No tickets saved'), array( 'status' => 500 ) );
        }
    }

    public function downloadTickets($request) {
        $tickets = TicketModel::getByPage(1);

        if (!empty($tickets)) {
            header('Content-Encoding: UTF-8');
            header("Content-Type: application/xls; charset=UTF-8");
            header("Content-Disposition: attachment; filename=tickets-".date('Y-m-d').".xls"); 
            echo "\xEF\xBB\xBF";

            include_once __DIR__."/../templates/tickets.php";
        } else {
            return new WP_Error( 'no_tickets', __('No tickets found'), array( 'status' => 404 ) );
        }        
    }
}
