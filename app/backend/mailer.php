<?php

ob_start();

include __DIR__ . "../../../src/Exception.php";
include __DIR__ . "../../../src/PHPMailer.php";
include __DIR__ . "../../../src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mailer
{
    function sendMyMail($toEmail,  $toName, $subject, $body)
    {
        $mail = new PHPMailer;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'server188.web-hosting.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'support@ravens-finance.com';                     //SMTP username
        $mail->Password   = 'ravensfinance123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->IsHTML(true);
        $mail->setFrom('support@ravens-finance.com', 'Youhodler');
        $mail->addReplyTo('support@ravens-finance.com', 'Youhodler');
        $mail->addAddress($toEmail, $toName);
        $mail->Subject = $subject;
        $mail->Body = $body;
        // try {
        ob_end_clean();
        $mail->send();

        // } catch (Exception $e) {
        //     echo $e->errorMessage();
        // }
    }
}
$mailer = new Mailer();
$mailer->sendMyMail('oputalawrence@gmail.com', 'ify', "verify email", '12345678');
