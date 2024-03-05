<?php

include '../module.php';
include '../mailer.php';

if (isset($_POST['uid'])) {
    $res = [];
    $uid = $_POST['uid'];
    $myuid = $_POST['myuid'];
    $receiver = $_POST['receiver'];
    $amt = $_POST['amount'];
    $n_amt = -$amt;
    $wallet = $_POST['wallet_name'];
    $curr = strtolower($_POST['wallet_name']);
    $wid = $_POST['wallet_id'];
    $note = $_POST['note'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $approved = 1;
    $type_from = "transfer from";
    $type_to = "transfer to";

    $data['user'] = $modules->getUserData($myuid);
    foreach ($data['user'] as $u) {
        $fname = $u['fname'];
        $email = $u['email'];
    }

    $data['user2'] = $modules->getUserData($uid);
    foreach ($data['user2'] as $u) {
        $fname2 = $u['fname'];
        $email2 = $u['email'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Transfer | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that you have made a transfer of $amt $wallet to $fname2, Account no.: $receiver.</p>
               <p>You have also been debited of $amt $wallet from your $wallet wallet.</p>
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

    $body2 = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Transfer | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname2, </h1>
               </center>
               <p>We wish to inform you that a transfer of $amt $wallet was made into your $wallet wallet from $fname and you have been credited as such.</p>
               <p>Make sure to add a $wallet wallet in order to see this money.</p>
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

    if ($modules->makeTransferTo($uid, $wid, $curr, $wallet, $amt, $from, $note, $approved, $type_to)) {
        if ($modules->makeTransferFrom($myuid, $wid, $wallet, $amt, $to, $note, $approved, $type_from)) {
            $mailer->sendMyMail($email, $fname, 'Transfer Debit', $body);
            $mailer->sendMyMail($email2, $fname2, 'Transfer Credit', $body2);
            $res['msg'] = 'sent';
        }
    }
    echo json_encode($res);
}
