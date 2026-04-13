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
        // $this->db_user = 'yfiniqvq_YieldFincs';
        // $this->db_name = 'yfiniqvq_db';
        // $this->db_host = 'localhost';
        // $this->db_pass = 'Yield123##00';
        $this->db_user = 'root';
        $this->db_name = 'yfincs';
        $this->db_host = 'localhost';
        $this->db_pass = '';
        // $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Connection Failed," . $e->getMessage();
        }
    }
}
