<?php

include '../module.php';
if (isset($_POST['wallet_id'])) {

    $response = [];

    $uid = $_POST['uid'];
    $wallet_id = $_POST['wallet_id'];
    $wallet_name = $_POST['wallet_name'];

    if ($modules->addWallet($uid, $wallet_id, $wallet_name)) {
        $response['header'] = 'added';
    } else {
        $response['header'] = 'removed';
    }

    echo json_encode($response);
}
