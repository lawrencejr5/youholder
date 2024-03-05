<?php
include '../module.php';
include '../mailer.php';

if (isset($_POST['uid'])) {
    $res = [];
    $uid = $_POST['uid'];
    $curr = $_POST['curr'];
    $amount = $_POST['amount'];
    $value = $_POST['value'];
    $wallet_id = $_POST['wallet_id'];
    $wallet = $_POST['wallet'];

    $data['user'] = $modules->getUserData($uid);
    foreach ($data['user'] as $u) {
        $fname = $u['fname'];
        $email = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Deposit | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that you have made a payment of <b>$amount $curr ($value $wallet)</b> in order to credit your <b>$wallet wallet</b>.</p>
               <p>We would inform you when this deposit has been approved. Thank you.</p>
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

    if ($modules->addDeposit($uid, $wallet_id, $wallet, $curr, $amount, $value)) {
        $res['header'] = 'deposited';
        $mailer->sendMyMail($email, $fname, 'Deposit request', $body);
    } else {
        $res['header'] = 'err';
    }

    echo json_encode($res);
}
