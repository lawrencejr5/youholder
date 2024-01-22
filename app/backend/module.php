<?php

include 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "../../phpMailer/src/PHPMailer.php";
include "../../phpMailer/src/SMTP.php";
include "../../phpMailer/src/Exception.php";

class Modules extends Connection
{
    private $sql;
    private $stmt;
    private $msg;
    private $otp;

    private function checkEmailExists($email)
    {
        $this->sql = "SELECT email FROM users WHERE email = :email";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }
    public function sendMail()
    {
        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'oputalawrence@gmail.com';                     //SMTP username
        $mail->Password   = 'law3221211';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->IsHTML(true);
        $mail->setFrom('oputalawrence@gmail.com', 'Iffff');
        $mail->addReplyTo('oputalawrence@gmail.com', 'Idddd');
        $mail->addAddress('lawjun.com@gmail.com', 'vvjfkkfk');
        $mail->Subject = 'kaaaaaaaaa';
        $mail->Body = 'ddjjdjdjd';
        // try {
        if ($mail->send()) {
            return true;
        }
        // } catch (Exception $e) {
        //     echo $e->errorMessage();
        // }
    }
    public function register($fname, $lname, $email, $phone, $password, $otp)
    {
        if ($this->checkEmailExists($email) > 0) {
            $this->msg = "exists";
            return $this->msg;
        } else {
            if ($this->sendMail('lawjun.com@gmail.com', 'lawjun3221211', 'Lawjun', $email,  $lname, "Verify your email", $otp)) {
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
            } else {
                $this->msg = "email_not_valid";
                return $this->msg;
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
if ($modules->sendMail()) {
    echo 'Sent';
} else {
    echo "error";
}
