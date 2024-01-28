<?php
include '../module.php';


if (isset($_POST['uid'])) {
    $res = [];
    $uid = $_POST['uid'];
    $curr = $_POST['curr'];
    $amount = $_POST['amount'];
    $value = $_POST['value'];
    $wallet_id = $_POST['wallet_id'];
    $user_wallet_id = $_POST['user_wallet_id'];
    $wallet = $_POST['wallet'];

    if ($modules->addDeposit($uid, $wallet_id, $user_wallet_id, $wallet, $curr, $amount, $value)) {
        $res['header'] = 'deposited';
    } else {
        $res['header'] = 'err';
    }

    echo json_encode($res);
}
