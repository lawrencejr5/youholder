<?php

include "../module.php";

$data['all_investments'] = $modules->getAllInvestments();

foreach ($data['all_investments'] as $i) {
    $id = $i['id'];
    $earned = $i['earned'] + $i['to_earn'];
    $status = $i['status'];
    $last = $i['last_updated'];
    $end = $i['end_date'];
    $curr = date('Y-m-d');
    $currT = time();

    $interval = $currT - $last;
    $diffT = $interval / (60 * 60 * 24 * 14);
    echo $diffT;
    if ($end <= $curr) {
        $modules->changeInvestStatus($id, 'ended');
    } elseif ($status == 'ended') {
        $modules->changeInvestStatus($id, 'ended');
    } elseif ($status == 'first phase' && $diffT >= 1) {
        $modules->investUp($id, $earned, time());
        $modules->changeInvestStatus($id, 'second phase');
    } elseif ($status == 'second phase' && $diffT >= 1) {
        $modules->investUp($id, $earned, time());
        $modules->changeInvestStatus($id, 'ended');
    }
}
