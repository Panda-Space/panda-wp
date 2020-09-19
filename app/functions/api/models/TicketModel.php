<?php

use Timber\Timber;

class TicketModel{    
    public function __construct(){

    }

    public static function index($request){
        $tickets = DBConnection::getConnection()->query("
            SELECT 
                *
            FROM 
                wp_tickets
            ORDER BY date_at DESC
        ");
        $ticketsArray = [];

        if ($tickets && $tickets->num_rows > 0) {
            while($ticket = $tickets->fetch_assoc()) {
                if($ticket)
                    array_push($ticketsArray, $ticket);
            }

            return $ticketsArray;
        } else {
            return false;
        }
    }

    public static function save($request){
        $tickets = true;

        for ($i=0; $i < $request['count']; $i++) { 
            $tickets =  DBConnection::getConnection()->query("
                INSERT INTO
                    wp_tickets(
                        date_at,
                        user,
                        competition,
                        package,
                        price,
                        discount
                    ) 
                VALUES(
                    '". date("Y-m-d G:i:s") ."',
                    '". $request['user'] ."',
                    '". $request['competitionId'] ."',
                    '". $request['count'] ."',
                    '". $request['price'] ."',
                    '". $request['discount'] ."'
                )
            ");
        }

        return $tickets;
    }

    public static function getByPage($page){
        $tickets = DBConnection::getConnection()->query("
            SELECT 
                *
            FROM 
                wp_tickets
            ORDER BY date_at DESC
            LIMIT ". self::__getLimit() ."
            OFFSET ". self::__getOffset($page) ."  
        ");
        $ticketsArray = [];

        if ($tickets && $tickets->num_rows > 0) {
            while($ticket = $tickets->fetch_assoc()) {
                if ($ticket) {
                    $user = Timber::get_post([
                        'post_type' => 'participant',
                        'meta_query' => [
                                [
                                    'key' => 'email',
                                    'value' => $ticket['user'],
                                    'compare' => '='
                                ],
                        ]                  
                    ]);

                    array_push($ticketsArray, (object)[
                        "id"            => $ticket['id'],
                        "date_at"       => $ticket['date_at'],
                        "user"          => sprintf('%s %s', $user->custom['firstname'], $user->custom['lastname']),
                        "user_email"    => $ticket['user'],
                        "competition"   => self::__getCompetitionData('title', $ticket['competition']),
                        "package"       => $ticket['package'],
                        "price"         => $ticket['price'],
                        "discount"      => $ticket['discount'],
                    ]);
                }
            }

            return $ticketsArray;
        } else {
            return false;
        }
    }

    public static function __getOffset($page){
        $offset = -1;
    
        if ( !isset($page) || $page == 1) {
            $offset = 0;
        } else {
            $offset = ($page - 1) * 20;
        }
    
        return $offset;
    }

    public static function __getLimit(){
        return 20;
    }
    
    public static function __getCompetitionData($meta, $id) {
        $competition = Timber::get_post([
            "post_type" => "competition",
            "p"         => $id,
        ]);

        return ($competition) ? $competition->title : null;
    }
}
