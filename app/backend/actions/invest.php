<?php

include '../module.php';

if (isset($_POST['amount'])) {
    $res = [];
    $uid = $_POST['uid'];
    $wid = $_POST['wid'];
    $amt = $_POST['amount'];
    $curr = $_POST['wname'];
    $pid = $_POST['planId'];
    $plan = $_POST['planName'];
    $perc = $_POST['mperc'];
    $usdVal = $_POST['usdVal'];
    $dura = $_POST['duration'];

    $start_date = date('Y-m-d H:m:s');
    $end_date = date('Y-m-d H:m:s', strtotime("+$dura days"));
    $expected = ($perc / 100) * $amt;
    $to_earn = (($perc / 100) * $amt) / $dura;

    if ($modules->investWithdrawal($uid, $wid, $curr, $amt, 1, 'investment')) {
        if ($modules->invest($uid, $pid, $wid, $plan, $curr, $amt, $usdVal, $to_earn, $expected, $start_date, $end_date, time())) {
            $res['header'] = 'invested';
        }
    }

    echo json_encode($res);
}
