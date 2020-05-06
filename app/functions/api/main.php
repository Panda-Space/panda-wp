<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Settings
 */
date_default_timezone_set('America/Lima');

include_once __DIR__ . "/config/db.php";

/**
 * Libs
 */

function __getRedemptionsStatus($request){
    $status_all = DBConnection::getConnection()->query("
        SELECT 
            *
        FROM 
            wp_redemptions
        ". __getWhereCountrySQL($request) ."
    ");

    $status_approved = DBConnection::getConnection()->query("
        SELECT 
            *
        FROM 
            wp_redemptions
        WHERE
            status = 'approved'
            ". __getWhereCountrySQL($request, 'v2') ."                       
    ");

    $status_rejected = DBConnection::getConnection()->query("
        SELECT 
            *
        FROM 
            wp_redemptions
        WHERE
            status = 'rejected'
            ". __getWhereCountrySQL($request, 'v2') ."                      
    ");

    $status_pending = DBConnection::getConnection()->query("
        SELECT 
            *
        FROM 
            wp_redemptions
        WHERE
            status = ''
            ". __getWhereCountrySQL($request, 'v2') ."                          
    ");

    return (object)[
        "all" => $status_all->num_rows, 
        "approved" => $status_approved->num_rows, 
        "rejected" => $status_rejected->num_rows,
        "pending" => $status_pending->num_rows
    ];
}

function __getWhereCountrySQL($request, $version = 'v1'){
    $country_code = get_field('country', 'user_' . $request['user']);
    $sql = '';
    
    if ($country_code && get_userdata($request['user'])->roles[0] != 'administrator') {
        if ($version == 'v1') {
            $sql = " WHERE country = '". $country_code ."' ";
        } else {
            $sql = " AND country = '". $country_code ."' ";
        }        
    }

    return $sql;
}

/**
 * Handlers
 */
function saveRedemption($request){
    $secret_key = '6LeO4fAUAAAAAGh7wuevgciEUCWi-Kx7uLi_gOHi';
    $response_key = $_POST['g-recaptcha-response'];
    $user_ip = $_SERVER['REMOTE_ADDR'];

    $request_url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_key&remoteip=$user_ip";
    $response_verify = json_decode(file_get_contents($request_url));

    if ($response_verify->success) {
        $redemptions_dir = __DIR__ . "/../../../../../uploads/redemptions/";

        $invoice_file_ext = pathinfo($_FILES['invoice_file']['name'], PATHINFO_EXTENSION);
    
        if($invoice_file_ext == 'jpg' || $invoice_file_ext == 'jpeg' || $invoice_file_ext == 'png'){
            $now = date("Y_m_d_H_i");
            $invoice_file = $redemptions_dir . $now . $_FILES['invoice_file']['name'];            
    
            if( is_uploaded_file($_FILES['invoice_file']['tmp_name']) ) {			
                if( !move_uploaded_file($_FILES['invoice_file']['tmp_name'], $invoice_file) ) {
                    return new WP_Error( 'no_seesion_file_saved', __('Invoice file (' . $_FILES['invoice_file']['name'] . ') not saved'), array( 'status' => 404 ) );
                }else{
                    $response = DBConnection::getConnection()->query("
                        INSERT INTO 
                            wp_redemptions(date_at,firstname,lastname,email,buy_date,shop,country,serie,invoice_number,invoice_file) 
                        VALUES(
                            '". date("Y-m-d") ."',
                            '". $request['firstname'] ."',
                            '". $request['lastname'] ."',
                            '". $request['email'] ."',
                            '". $request['buy_date'] ."',
                            '". $request['shop'] ."',
                            '". $request['country'] ."',
                            '". $request['serie'] ."',
                            '". $request['invoice_number'] ."',
                            '". $now . $_FILES['invoice_file']['name'] ."'
                        )
                    ");
                    
                    if ($response) {
                        return new WP_REST_Response("Saved", 200);
                    } else {
                        return new WP_Error( 'no_redemption', __('No redemption saved'), array( 'status' => 404 ) );
                    }
                }
            }else{
                return new WP_Error( 'no_seesion_file_uploaded', __('Invoice file (' . $_FILES['invoice_file']['name'] . ') not uploaded'), array( 'status' => 404 ) );
            }
        }else{
            return new WP_Error( 'no_right_invoice_file', __('Invoice file (' . $_FILES['invoice_file']['name'] . ') with wrong format'), array( 'status' => 404 ) );
        }
    } else {
        return new WP_Error( 'invalid_captcha', __('Invalid captcha'), array( 'status' => 403 ) );
    }
}

function rejectRedemption($request){
    $response = DBConnection::getConnection()->query("
        UPDATE 
            wp_redemptions 
        SET
            status = 'rejected'
        WHERE
            id = '". $request['redemption_id'] ."'
    ");
    
    if ($response) {
        return new WP_REST_Response("Rejected", 200);
    } else {
        return new WP_Error( 'no_redemption_rejected', __('No redemption rejected'), array( 'status' => 404 ) );
    }
}

function getRedemptions($request){
    $redemptions = [];
    $limit = -1;

    if ( !isset($request['page']) || $request['page'] == 1) {
        $limit = 5;
    } else {
        $limit = (($request['page'] - 1) * 5 ) . "," . (($request['page'] - 1) * 5 + 5 );
    }

    if( !isset($request['status']) ){
        $redemptions = DBConnection::getConnection()->query("
            SELECT 
                *
            FROM 
                wp_redemptions
            ". __getWhereCountrySQL($request) ."
            ORDER BY date_at DESC
            LIMIT ". $limit ."
        ");   

    }else if($request['status'] == 'approved'){
        $redemptions = DBConnection::getConnection()->query("
            SELECT 
                *
            FROM 
                wp_redemptions             
            WHERE
                status = 'approved'
            ". __getWhereCountrySQL($request, 'v2') ."
            ORDER BY date_at DESC
            LIMIT ". $limit ."                
        ");

    }else if($request['status'] == 'rejected'){
        $redemptions = DBConnection::getConnection()->query("
            SELECT 
                *
            FROM 
                wp_redemptions               
            WHERE
                status = 'rejected'
            ". __getWhereCountrySQL($request, 'v2') ."                
            ORDER BY date_at DESC
            LIMIT ". $limit ."                              
        "); 

    }else if($request['status'] == 'pending'){
        $redemptions = DBConnection::getConnection()->query("
            SELECT 
                *
            FROM 
                wp_redemptions               
            WHERE
                status = ''
            ". __getWhereCountrySQL($request, 'v2') ."
            ORDER BY date_at DESC
            LIMIT ". $limit ."                           
        ");
    }

    $satus = __getRedemptionsStatus($request);
    $redemptions_array = [];

    if ($redemptions && $redemptions->num_rows > 0 || $satus) {
        while($row = $redemptions->fetch_assoc()) {
            if($row)
                array_push($redemptions_array, $row);
        }

        return new WP_REST_Response((object)[
            "status" => $satus,
            "list" => $redemptions_array
        ], 200);
    }else {
        return new WP_Error( 'no_redemptions', __('No redemptions found'), array( 'status' => 404 ) );
    }     
}

function approveRedemption($request){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'innovdevelopers.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'no-reply@innovdevelopers.com';                     // SMTP username
        $mail->Password   = 'n#r-(]N6yH=5';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('no-reply@innovdevelopers.com', "Codes - Asus");
        $mail->addAddress($request['user']);  // Add a recipient

        // Content
        $body = $request['mail'];

        $mail->isHTML(true); 
        $mail->Subject = "Codes - Asus";
        $mail->MsgHTML($body);

        $mail->send();

        $response = DBConnection::getConnection()->query("
            UPDATE 
                wp_redemptions 
            SET
                status = 'approved'
            WHERE
                id = '". $request['redemption_id'] ."'
        ");

        return new WP_REST_Response('Message has been send', 200);
    } catch (Exception $e) {
        return new WP_Error( 'Message could not be sent', __($mail->ErrorInfo), array( 'status' => 404 ) );
    }    
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'custom/v1', '/redemption', array(
        'methods' => 'POST',
        'callback' => 'saveRedemption'
    ));

    register_rest_route( 'custom/v1', '/redemptions', array(
        'methods' => 'GET',
        'callback' => 'getRedemptions'
    ));

    register_rest_route( 'custom/v1', '/redemption/(?P<redemption_id>\d+)/reject', array(
        'methods' => 'DELETE',
        'callback' => 'rejectRedemption'
    ));

    register_rest_route( 'custom/v1', '/redemption/(?P<redemption_id>\d+)/approve', array(
        'methods' => 'POST',
        'callback' => 'approveRedemption'
    ));
});
