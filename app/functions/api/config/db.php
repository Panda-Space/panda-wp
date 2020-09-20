<?php 

class DBConnection{
    public $connection;

    public function __construct(){
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public static function getConnection(){
        return new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public function createParticipantTable(){
        $this->connection->query("CREATE TABLE IF NOT EXISTS wp_participants(
            id INT NOT NULL AUTO_INCREMENT,
            date_at DATETIME NOT NULL,
            firstname VARCHAR(70) NOT NULL,
            lastname VARCHAR(70) NOT NULL,
            dni VARCHAR(10) NOT NULL,
            mobile INT NOT NULL,
            mobile_operator VARCHAR(50) NOT NULL,
            mobile_modality VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            department VARCHAR(50) NOT NULL,
            district VARCHAR(50) NOT NULL,
            province VARCHAR(50) NOT NULL,
            date_buy VARCHAR(15) NOT NULL,
            product VARCHAR(30) NOT NULL,
            invoice_file VARCHAR(200) NOT NULL,
            status VARCHAR(100) NULL,
            PRIMARY KEY (id)
        )");
    }
}

$connection = new DBConnection();

$connection->createParticipantTable();
