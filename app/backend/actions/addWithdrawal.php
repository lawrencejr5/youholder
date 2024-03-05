<?php


include '../module.php';
include '../mailer.php';

if (isset($_POST['amount'])) {
    $res = [];
    $uid = $_POST['uid'];
    $amt = $_POST['amount'];
    $wid = $_POST['wallet_id'];
    $wallet = $_POST['wallet_name'];
    $address = $_POST['address'];
    $data['user'] = $modules->getUserData($uid);
    foreach ($data['user'] as $u) {
        $fname = $u['fname'];
        $email = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Withdrawal | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that you have made a withdrawal request of <b>$amt $wallet</b>, address: <b>$address</b>.</p>
               <p>We would get back to you within the next 24 hrs and we would inform you when this withdrawal has been approved and you have been credited. Thank you.</p>
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

    $withdrawn = $modules->makeWithdrawal($uid, $wid, $amt, $address, $wallet);
    if ($withdrawn) {
        $res['header'] = 'good';
        $mailer->sendMyMail($email, $fname, 'Withdrawal request', $body);
    } else {
        $res['header'] = 'err';
    }
    echo json_encode($res);
}
