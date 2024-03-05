<?php


include "../module.php";
include "../mailer.php";

if (isset($_POST['wallet_from'])) {
    $res = [];
    $widf = $_POST['widf'];
    $widt = $_POST['widt'];
    $amount = $_POST['amount'];
    $uid = $_POST['uid'];
    $wallet_from = $_POST['wallet_from'];
    $wallet_to = $_POST['wallet_to'];
    $converted = $_POST['converted'];
    $type_from = "exchange from";
    $type_to = "exchange to";
    $approved = 1;

    $data['user'] = $modules->getUserData($uid);
    foreach ($data['user'] as $u) {
        $fname = $u['fname'];
        $email = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Exchange | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that you have made an exchange of $amount $wallet_from to $converted $wallet_to.</p>
               <p>Thank you for choosing Yield Financial Services.</p>
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

    if ($modules->exchangeTo($uid, $widt, $wallet_from, $wallet_to, $amount, $converted, $approved, $type_to)) {
        if ($modules->exchangeFrom($uid, $widf, $wallet_from, $amount, $approved, $type_from)) {
            $res['header'] = 'exchanged';
            $mailer->sendMyMail($email, $fname, 'Crypto/Fiat Exchange', $body);
        }
    }

    echo json_encode($res);
}
