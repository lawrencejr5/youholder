<?php


include "../module.php";

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

    if ($modules->exchangeTo($uid, $widt, $wallet_from, $wallet_to, $amount, $converted, $approved, $type_to)) {
        if ($modules->exchangeFrom($uid, $widf, $wallet_from, $amount, $approved, $type_from)) {
            $res['header'] = 'exchanged';
        }
    }

    echo json_encode($res);
}
