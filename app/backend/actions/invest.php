<?php

include '../module.php';
include '../mailer.php';

if (isset($_POST['amount'])) {
    $res = [];
    $uid = $_POST['uid'];
    $wid = $_POST['wid'];
    $amt = $_POST['amount'];
    $curr = $_POST['wname'];
    $pid = $_POST['planId'];
    $plan = $_POST['planName'];
    $perc = $_POST['mperc'];
    $usdVal = $_POST['usdVal'];
    $dura = $_POST['duration'];

    $start_date = date('Y-m-d H:m:s');
    $end_date = date('Y-m-d H:m:s', strtotime("+$dura days"));
    $expected = ($perc / 100) * $amt;
    $to_earn = (($perc / 100) * $amt) / $dura;

    $data['user'] = $modules->getUserData($uid);
    foreach ($data['user'] as $u) {
        $fname = $u['fname'];
        $email = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Investment | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that you have made an investment of <b>$amt $curr</b>. 
               You will earn <b>$to_earn $curr daily</b> for the next $dura days which would sum up to <b>$expected $curr</b>. 
               Your investment is expected to end on <b>$end_date</b> and you will be informed when your investment has ended.</p>
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


    if ($modules->investWithdrawal($uid, $wid, $curr, $amt, 1, 'investment')) {
        if ($modules->invest($uid, $pid, $wid, $plan, $curr, $amt, $usdVal, $to_earn, $expected, $start_date, $end_date, time())) {
            $res['header'] = 'invested';
            $mailer->sendMyMail($email, $fname, 'Investment', $body);
        }
    }

    echo json_encode($res);
}
