<?php

require(__DIR__ . '/../models/ParticipantModel.php');

class ParticipantController {
    public function __construct() {
        add_action( 'rest_api_init', function () {
            register_rest_route( 'custom/v1', '/participants', array(
                'methods' => 'POST',
                'callback' => array($this, 'store')
            ));

            register_rest_route( 'custom/v1', '/participants', array(
                'methods' => 'GET',
                'callback' => array($this, 'getByPage')
            ));

            register_rest_route( 'custom/v1', '/participants/download', array(
                'methods' => 'GET',
                'callback' => array($this, 'downloadParticipants')
            ));
        });
    }

    public function store($request) {
        $invoiceFile = $this::saveParticipantInvoice($request);

        if ($invoiceFile->code == 'invoice_file_saved') {
            if (ParticipantModel::save($request, $invoiceFile->filename)) {
                return new WP_REST_Response((object)[
                    "message" => "Participant saved succesfully"
                ]);
            } else {
                return new WP_Error( 'no_participant_saved', __('No participant saved'), array( 'status' => 500 ) );
            }
        } else {
            return new WP_Error( 'no_invoice_file_saved', __('No invoice file saved'), array( 'status' => 500 ) );
        }
    }

    public function getByPage($request) {
        $participants = [];

        if (!isset($request['page']) || $request['page'] == 1) {
            $participants = ParticipantModel::getByPage(1);
        } else {
            $participants = ParticipantModel::getByPage($request['page']);
        }

        if (!empty($participants)) {
            return new WP_REST_Response((object)[
                "message" => "Participants here!!",
                "data" => $participants
            ]);
        } else {
            return new WP_Error( 'no_tickets_saved', __('No tickets saved'), array( 'status' => 500 ) );
        }
    }

    public function downloadTickets($request) {
        $tickets = ParticipantModel::getByPage(1);

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

    private function saveParticipantInvoice($request){
        $invoiceFile = (object)[
            "ext" => pathinfo($_FILES['invoiceFile']['name'], PATHINFO_EXTENSION),
            "name" => '' ,
            "dir" => __DIR__ . "/../../../../../../uploads/participants/"
        ];

        if($invoiceFile->ext == 'jpg' || $invoiceFile->ext == 'jpeg' || $invoiceFile->ext == 'png' || $invoiceFile->ext == 'PNG'){
            $now = date("Y_m_d_H_i");
            $invoiceFile->name = $invoiceFile->dir . $now . $_FILES['invoice_file']['name'];      
    
            if( is_uploaded_file($_FILES['invoice_file']['tmp_name']) ) {			
                if( !move_uploaded_file($_FILES['invoice_file']['tmp_name'], $invoiceFile->name) ) {
                    return (object)[
                        "code" => "no_invoice_file_saved",
                        "message" => "Invoice file (" . $_FILES['invoice_file']['name'] . ") not saved"
                    ];
                }else{
                    return (object)[
                        "code" => "invoice_file_saved",
                        "filename" => $now . $_FILES['invoice_file']['name']
                    ];
                }
            }else{
                return (object)[
                    "code" => "no_invoice_file_uploaded",
                    "message" => "Invoice file (" . $_FILES['invoice_file']['name'] . ") not uploaded"
                ];
            }
        }else{
            return (object)[
                "code" => 'no_right_invoice_file',
                "message" => "Invoice file (" . $_FILES['invoice_file']['name'] . ") with wrong format"
            ];            
        }
    }
}
