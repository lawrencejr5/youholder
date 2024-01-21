<?php

class Connection
{
    private $db_user;
    private $db_name;
    private $db_host;
    private $db_pass;
    public $conn;

    public function __construct()
    {
        $this->db_user = 'root';
        $this->db_name = 'youhodler';
        $this->db_host = 'localhost:3325';
        $this->db_pass = '';
        // $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo "Connection Failed," . $e->getMessage();
        }
    }
}
