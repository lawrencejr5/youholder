<?php

include '../module.php';


$data['stakes'] = $modules->getAllStakes();

foreach ($data['stakes'] as $s) {
    $id = $s['id'];
    $earned = $s['earned'] + $s['daily_earned'];
    $end = $s['end_date'];

    $current_date = date('Y-m-d H:m:s');
    if ($current_date > $end) {
        $modules->stakeEnd($id, 'ended');
    } else {
        if ((time() - $s['last_updated']) > 21600) {
            $modules->stakeUp($id, $earned, 'staking', time());
        }
    }
}
