<?php

include '../module.php';


$data['stakes'] = $modules->getAllStakes();

foreach ($data['stakes'] as $s) {
    $id = $s['id'];
    $earned = $s['earned'] + $s['daily_earned'];
    $end = $s['end_date'];
    $stat = $s['status'];

    $current_date = date('Y-m-d H:m:s');
    if ($current_date > $end) {
        $modules->stakeEnd($id, 1);
        $modules->stakeStat($id, 'ended');
    } elseif ($stat == 'unstaked') {
        $modules->stakeStat($id, 'unstaked');
    } else {
        if ((time() - $s['last_updated']) >= 21600) {
            $modules->stakeUp($id, $earned, 'staking', time());
        }
    }
}
