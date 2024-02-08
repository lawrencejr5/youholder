<?php

include '../module.php';

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
    $end_date = date('Y-m-d H:m:s', strtotime("+365 days"));

    $earned = (($apy / 100) * $staked) / 365;

    if ($modules->stake($uid, $planId, $planName, $staked, $earned, $start_date, $end_date)) {
        $res['header'] = 'staked';
    }

    echo json_encode($res);
}
