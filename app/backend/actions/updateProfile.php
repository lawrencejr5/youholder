<?php
include '../module.php';
include '../mailer.php';
session_start();

if (isset($_POST['fname'])) {
    $response = [];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $level = $_POST['level'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $timezone = $_POST['timezone'];

    $data['user'] = $modules->getUserData($_SESSION['id']);
    foreach ($data['user'] as $u) {
        $email = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Portfolio Level Upgrade | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that your account details have been updated and you have your portfolio has been upgraded to Level 2. This means that your portfolio would no longer be restricted from making Investments.</p>
               <p>We would also urge you to submit required documents in order to be upgraded to the highest level thereby being able to benefit fully from our platform.</p>
               <p>You can <a href='https://yieldfincs.com/youholder/login'>login</a> to perform more actions on your account.</p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly let us know so that we can terminate this process.</p>
               <center>
                    <a href='https://yieldfincs.com/youholder/t&c'>Terms and condtions</a> | 
                    <a href='https://yieldfincs.com/youholder/policy'>Privacy Policy</a>
               </center>
            </body>
        </html>
    ";


    if ($level == '1') {
        $modules->updateProfile($fname, $lname, $phone, $address1, $address2, $city, $state, $country, $timezone, $_SESSION['id']);
        $modules->upLevel($_SESSION['id'], 2);
        $response['header'] = 'updated_and_upgraded';
        $mailer->sendMyMail($email, $fname, 'Portfolio Level Upgrade', $body);
    } else {
        $modules->updateProfile($fname, $lname, $phone, $address1, $address2, $city, $state, $country, $timezone, $_SESSION['id']);
        $response['header'] = 'updated';
    }
    echo json_encode($response);
}
