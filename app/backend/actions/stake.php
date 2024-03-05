<?php

include '../module.php';
include '../mailer.php';

if (isset($_POST['staked'])) {
    $res = [];
    $uid = $_POST['uid'];
    $wid = $_POST['wid'];
    $apy = $_POST['apy'];
    $amount = $_POST['amount'];
    $wname = $_POST['wname'];
    $planId = $_POST['planId'];
    $planName = $_POST['planName'];
    $staked = $_POST['staked'];
    $start_date = date('Y-m-d H:m:s');
    $last_updated = time();
    $end_date = date('Y-m-d H:m:s', strtotime("+365 days"));

    $earned = (($apy / 100) * $staked) / 365;
    $expected = ($apy / 100) * $staked;

    $data['user'] = $modules->getUserData($uid);
    foreach ($data['user'] as $u) {
        $fname = $u['fname'];
        $email = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Staking | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that you have made a staking of <b>$staked $wname</b>. 
               You will earn <b>$earned $wname</b> for the next 1 year which would sum up to <b>$expected $wname</b>. 
               Your staking is expected to end on <b>$end_date</b> and you will be informed when your staking has ended.</p>
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

    if ($modules->stakeWithdrawal($uid, $wid, $wname, $amount, 1, 'staking')) {
        if ($modules->stake($uid, $planId, $wid, $planName, $staked, $expected, $earned, $start_date, $end_date, $last_updated)) {
            $res['header'] = 'staked';
            $mailer->sendMyMail($email, $fname, 'Crypto staking', $body);
        }
    }

    echo json_encode($res);
}

if (isset($_POST['stakeId'])) {
    $res = [];
    $id = $_POST['stakeId'];
    $status = 'unstaked';
    if ($modules->stakeStat($id, $status)) {
        $res['header'] = 'unstaked';
    }
    echo json_encode($res);
}
