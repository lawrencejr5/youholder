<?php

include '../module.php';

if ($_POST['wid']) {
    $res = [];
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $wid = $_POST['wid'];
    $cur = $_POST['cur'];
    $amt = $_POST['amt'];

    if ($modules->claimInvestProfit($uid, $wid, $cur, $cur, $amt, $amt, 'Investment return', 1)) {
        if ($modules->investAvailableWithdraw($id, 0)) {
            $res['header'] = 'claimed';
        }
    }
    echo json_encode($res);
}
