<?php 

class DBConnection{
    public $connection;

    public function __construct(){
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public static function getConnection(){
        return new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public function createTicketTable(){
        $this->connection->query("CREATE TABLE IF NOT EXISTS wp_tickets(
            id INT NOT NULL AUTO_INCREMENT,
            date_at DATETIME NOT NULL, 
            user VARCHAR(70) NOT NULL,
            competition INT NOT NULL,
            package INT NOT NULL,
            price DECIMAL NOT NULL,
            discount DECIMAL NOT NULL,
            PRIMARY KEY (id)
        )");
    }
}

$connection = new DBConnection();

$connection->createTicketTable();
