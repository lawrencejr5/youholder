<?php

include '../module.php';

if (isset($_POST['receiver'])) {
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
    $type = "transfer";

    $sentFrom = $modules->makeTransferFrom($myuid, $wid, $wallet, $amt, $to, $notes, $approved, $type);
    $sentTo = $modules->makeTransferTo($uid, $wid, $curr, $wallet, $amt, $from, $notes, $approved, $type);
    if ($sentTo) {
        if ($sentFrom) {
            $res['header'] = 'sent';
        } else {
            $res['header'] = $sentTo;
        }
    } else {
        $res['header'] = $sentFrom;
    }
    echo json_encode($res);
}
