<?php

include '../module.php';
include '../mailer.php';

if (isset($_POST['fname'])) {
    $response = [];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $referer = $_POST['referer'];
    $otp = rand(100000, 999999);
    $no = rand(1234567, 9999999);
    $account_no = 'yf-' . strtolower($lname) . '00' . $no;

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Email Verification | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yfincs.com/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Verify your email</h1>
                    <p>Do not share this code with any body</p>
               </center>
               <p>Email: $email</p>
               <p>Verification Code: $otp</p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly reply this email saying it's not you so that we can terminate this registration.</p>
               <center>
                    <a href='https://yfincs.com/t&c'>Terms and condtions</a> | 
                    <a href='https://yfincs.com/policy'>Privacy Policy</a>
               </center>
            </body>
        </html>
    ";

    $registered = $modules->register($fname, $lname, $email, $account_no, $phone, $pass, $otp, $referer);

    if ($registered == 'exists') {
        $response['header'] = 'exists';
    } elseif ($registered == 'chuwa') {
        if ($mailer->sendMyMail($email, $fname, 'Verification Code', $body)) {
            $response['header'] = 'good';
        } else {
            $response['header'] = 'wrong';
        }
    }

    echo json_encode($response);
}
