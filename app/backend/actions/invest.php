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
    $bperc = $_POST['bperc'];
    $mperc = $_POST['mperc'];
    $status = "first phase";

    $start_date = date('Y-m-d H:m:s');
    $end_date = date('Y-m-d H:m:s', strtotime('+30 days'));
    $expected = ($mperc / 100) * $amt;
    $to_earn = ($bperc / 100) * $amt;

    if ($modules->invest($uid, $pid, $plan, $curr, $amt, $to_earn, $expected, $start_date, $end_date, time(), $status)) {
        $res['header'] = 'invested';
    }

    echo json_encode($res);
}
