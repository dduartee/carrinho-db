<?php

namespace App\Core;

use PDO;

class Database extends PDO {
    private string $DB_NAME = 'carrinho_db';
    private string $DB_USER = 'root';
    private string $DB_PASS = '';
    private string $DB_HOST = 'localhost';
    private int $DB_PORT = 3306;

    private $conn;
    
    public function __construct()
    {
        $this->conn = new PDO("mysql:dbname=$this->DB_NAME;host=$this->DB_HOST;port=$this->DB_PORT;user=$this->DB_USER;password=$this->DB_PASS");
    }
}