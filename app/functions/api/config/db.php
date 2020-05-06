<?php 

class DBConnection{        
    public $connection;

    public function __construct(){
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public static function getConnection(){
        return new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public function createRedemptionTable(){
        $this->connection->query("CREATE TABLE IF NOT EXISTS wp_redemptions(
            id INT NOT NULL AUTO_INCREMENT,
            date_at DATE NOT NULL, 
            firstname VARCHAR(100) NOT NULL,
            lastname VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            buy_date VARCHAR(100) NOT NULL,
            shop VARCHAR(100) NOT NULL,
            country VARCHAR(100) NOT NULL,
            serie VARCHAR(100) NOT NULL,
            invoice_number VARCHAR(100) NOT NULL,
            invoice_file VARCHAR(100) NOT NULL,
            status VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)
        )");
    }
}

/**
 * Init
 */
$connection = new DBConnection();

/**
 * Creation tables
 */
$connection->createRedemptionTable();
