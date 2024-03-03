<?php

include '../module.php';
include '../mailer.php';

if (isset($_POST['code'])) {
    $res = [];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $fname = $_POST['fname'];

    if (!$fname) {
        $data['user'] = $modules->getUserDataWithEmail($email);
        foreach ($data['user'] as $u) {
            $fname = $u['fname'];
        }
    }



    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Welcome | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>You're welcome, $fname</h1>
               </center>
               <p>The Yield Financial Services team officially welcomes you to our platform.</p>
               <p>You can get started by Loging in <a href='https://yieldfincs.com/youholder/login'>here</a>. Get started by adding wallets, </p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly reply this email saying it's not you so that we can terminate this account.</p>
               <center>
                    <a href='https://yieldfincs.com/youholder/t&c'>Terms and condtions</a> | 
                    <a href='https://yieldfincs.com/youholder/policy'>Privacy Policy</a>
               </center>
            </body>
        </html>
    ";

    if ($modules->checkEmailExists($email) == 0) {
        $res['header'] = 'err';
    } else if ($modules->checkVerifyCode($code, $email) == 0) {
        $res['header'] = 'wrong';
    } else {
        if ($modules->verifyEmail($email)) {
            $res['header'] = 'verified';
            $mailer->sendMyMail($email, $fname, 'Welcome to YieldFincs', $body);
        }
    }

    echo json_encode($res);
}
