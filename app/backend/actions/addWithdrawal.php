<?php


include '../module.php';

if (isset($_POST['amount'])) {
    $res = [];
    $uid = $_POST['uid'];
    $amt = $_POST['amount'];
    $uwid = $_POST['user_wallet_id'];
    $wid = $_POST['wallet_id'];
    $wallet = $_POST['wallet_name'];
    $address = $_POST['address'];

    $withdrawn = $modules->makeWithdrawal($uid, $uwid, $wid, $amt, $address, $wallet);
    if ($withdrawn) {
        $res['header'] = 'good';
    } else {
        $res['header'] = 'err';
    }
    echo json_encode($res);
}
