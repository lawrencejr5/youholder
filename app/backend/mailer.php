<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "../../../phpMailer/src/PHPMailer.php";
include "../../../phpMailer/src/SMTP.php";
include "../../../phpMailer/src/Exception.php";

class Mailer
{
    function sendMyMail($toEmail, $toName, $subject, $body)
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'wghp6.wghservers.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'support@yieldfincs.com';                     //SMTP username
        $mail->Password   = 'yieldfincs123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('support@yieldfincs.com', 'Yield Financial Services');
        $mail->addReplyTo('support@yieldfincs.com', 'Yield Financial Services');
        $mail->addAddress($toEmail, $toName);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        try {
            ob_end_clean();
            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->errorMessage();
        }
    }
}
$mailer = new Mailer();
// $mailer->sendMyMail('oputalawrence@gmail.com', 'ify', "verify email", '12345678');
