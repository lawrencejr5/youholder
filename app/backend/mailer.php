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
        $mail = new PHPMailer;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'server188.web-hosting.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'support@ravens-finance.com';                     //SMTP username
        $mail->Password   = 'ravensfinance123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('support@ravens-finance.com', 'Yield Financial Services');
        $mail->addReplyTo('support@ravens-finance.com', 'Yield Financial Services');
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
