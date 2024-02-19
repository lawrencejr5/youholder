<?php

include '../module.php';

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

    if ($modules->makeTransferTo($uid, $wid, $curr, $wallet, $amt, $from, $note, $approved, $type_to)) {
        if ($modules->makeTransferFrom($myuid, $wid, $wallet, $amt, $to, $note, $approved, $type_from)) {
            $res['msg'] = 'sent';
        }
    }
    echo json_encode($res);
}
