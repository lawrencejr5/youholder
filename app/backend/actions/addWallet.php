<?php

include '../module.php';
if (isset($_POST['wallet_id'])) {

    $response = [];

    $uid = $_POST['uid'];
    $wallet_id = $_POST['wallet_id'];

    if ($modules->addWallet($uid, $wallet_id)) {
        $response['header'] = 'added';
    } else {
        $response['header'] = 'removed';
    }

    echo json_encode($response);
}
