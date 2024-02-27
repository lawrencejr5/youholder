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
    $last_updated = time();
    $end_date = date('Y-m-d H:m:s', strtotime("+365 days"));

    $earned = (($apy / 100) * $staked) / 365;
    $expected = ($apy / 100) * $staked;

    if ($modules->stakeWithdrawal($uid, $wid, $wname, $amount, 1, 'staking')) {
        if ($modules->stake($uid, $planId, $wid, $planName, $staked, $expected, $earned, $start_date, $end_date, $last_updated)) {
            $res['header'] = 'staked';
        }
    }

    echo json_encode($res);
}

if (isset($_POST['stakeId'])) {
    $res = [];
    $id = $_POST['stakeId'];
    $status = 'unstaked';
    if ($modules->stakeStat($id, $status)) {
        $res['header'] = 'unstaked';
    }
    echo json_encode($res);
}
