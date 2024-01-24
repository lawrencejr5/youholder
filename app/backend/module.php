<?php

include 'conn.php';
class Modules extends Connection
{
    private $sql;
    private $stmt;
    private $msg;
    private $otp;

    // Function to check if user already exists
    private function checkEmailExists($email)
    {
        $this->sql = "SELECT email FROM users WHERE email = :email";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

    private function checkPassword($password, $id)
    {
        $this->sql = "SELECT password FROM users WHERE password = :password AND id = :id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->bindParam(':password', $password);
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

    // Function to create account
    public function register($fname, $lname, $email, $phone, $password, $otp)
    {
        if ($this->checkEmailExists($email) > 0) {
            $this->msg = "exists";
            return $this->msg;
        } else {
            $this->sql = "INSERT INTO users(fname, lname, email, phone, password, verify_code) VALUES(:fname, :lname, :email, :phone, :password, :verify_code)";
            try {
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':fname', $fname);
                $this->stmt->bindParam(':lname', $lname);
                $this->stmt->bindParam(':email', $email);
                $this->stmt->bindParam(':phone', $phone);
                $this->stmt->bindParam(':password', $password);
                $this->stmt->bindParam(':verify_code', $otp);
                $this->stmt->execute();
                $this->msg = 'chuwa';
                return $this->msg;
            } catch (PDOException $e) {
                echo "Failed," . $e->getMessage();
            }
        }
    }

    // Login user if user exists
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

    // Update user personal details
    public function updateProfile($fname, $lname, $phone, $address1, $address2, $city, $state, $country, $timezone, $id)
    {
        try {
            //code...
            $this->sql = "UPDATE users SET fname = :fname, lname = :lname, phone = :phone, address1 = :address1, address2 = :address2, city = :city, state = :state, country = :country, timezone = :timezone WHERE id = :id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':fname', $fname);
            $this->stmt->bindParam(':lname', $lname);
            $this->stmt->bindParam(':phone', $phone);
            $this->stmt->bindParam(':address1', $address1);
            $this->stmt->bindParam(':address2', $address2);
            $this->stmt->bindParam(':city', $city);
            $this->stmt->bindParam(':state', $state);
            $this->stmt->bindParam(':timezone', $timezone);
            $this->stmt->bindParam(':country', $country);
            $this->stmt->bindParam(':id', $id);
            if ($this->stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            //throw $e
            echo 'false ' . $e->getMessage();
            return false;
        }
    }

    // Update password of user
    public function updatePassword($oldPassword, $newPassword, $id)
    {
        try {
            if ($this->checkPassword($oldPassword, $id) == 1) {
                $this->sql = "UPDATE users SET password = :password WHERE id = :id";
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':password', $newPassword);
                $this->stmt->bindParam(':id', $id);
                $this->stmt->execute();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
        }
    }

    // Fetch user data
    public function getUserData($id)
    {
        try {
            $this->sql = 'SELECT * FROM users WHERE id = :id';
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
}


// Initializing class
$modules = new Modules();
