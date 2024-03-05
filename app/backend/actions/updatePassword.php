<?php
include '../module.php';
include '../mailer.php';
session_start();

if ($_POST['newPass']) {
    $response = [];

    $newPass = $_POST['newPass'];
    $oldPass = $_POST['oldPass'];

    $data['user'] = $modules->getUserData($uid);
    foreach ($data['user'] as $u) {
        $fname = $u['fname'];
        $email = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Password update | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that your account password was changed. Please, if this action was not done by you, kindly reply to this email so that we can revert this change.</p>
               <p>Thank you for choosing Yield Financial Services.</p>
               <p>You can <a href='https://yieldfincs.com/youholder/login'>login</a> to perform more actions on your account.</p>
               <br/>
               <br/>
               <center>
                    <a href='https://yieldfincs.com/youholder/t&c'>Terms and condtions</a> | 
                    <a href='https://yieldfincs.com/youholder/policy'>Privacy Policy</a>
               </center>
            </body>
        </html>
    ";

    $passUpdated = $modules->updatePassword($oldPass, $newPass, $_SESSION['id']);

    if ($passUpdated) {
        $response['header'] = "updated";
        $mailer->sendMyMail($email, $fname, 'Password updated', $body);
    } else {
        $response['header'] = "failed";
    }
    echo json_encode($response);
}
