<?php

include 'conn.php';

class Modules extends Connection
{
    private $sql;
    private $stmt;

    public function register($fname, $lname, $email, $phone, $password)
    {
        $this->sql = "INSERT INTO users(fname, lname, email, phone, password) VALUES(:fname, :lname, :email, :phone, :password)";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':fname', $fname);
            $this->stmt->bindParam(':lname', $lname);
            $this->stmt->bindParam(':email', $email);
            $this->stmt->bindParam(':phone', $phone);
            $this->stmt->bindParam(':password', $password);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Failed," . $e->getMessage();
        }
    }
}

$modules = new Modules();
