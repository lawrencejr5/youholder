<?php

include 'conn.php';
class Modules extends Connection
{
    private $sql;
    private $stmt;
    private $msg;
    private $otp;

    public function checkEmailExists($email)
    {
        $this->sql = "SELECT email FROM users WHERE email = :email";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

    public function register($fname, $lname, $email, $phone, $password)
    {
        if ($this->checkEmailExists($email) > 0) {
            $this->msg = "exists";
            return false;
        } else {
            $this->sql = "INSERT INTO users(fname, lname, email, phone, password) VALUES(:fname, :lname, :email, :phone, :password)";
            try {
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':fname', $fname);
                $this->stmt->bindParam(':lname', $lname);
                $this->stmt->bindParam(':email', $email);
                $this->stmt->bindParam(':phone', $phone);
                $this->stmt->bindParam(':password', $password);
                // $this->stmt->bindParam(':verify_code', $otp);
                $this->stmt->execute();
                $this->msg = 'chuwa';
                return true;
            } catch (PDOException $e) {
                echo "Failed," . $e->getMessage();
            }
        }
    }

    public function login($email, $pass)
    {
        try {
            //code...
            $this->sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':email', $email);
            $this->stmt->bindParam(':password', $pass);
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$modules = new Modules();
