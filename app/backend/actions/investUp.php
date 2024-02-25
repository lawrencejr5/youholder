<?php

include "../module.php";

$data['all_investments'] = $modules->getAllInvestments();

foreach ($data['all_investments'] as $i) {
    $id = $i['id'];
    $earned = $i['earned'] + $i['to_earn'];
    $earnings2 = ($i['earned'] / 2) + $i['available_withdrawal'];
    $earnings3 = ($i['earned'] / 3) + $i['available_withdrawal'];
    $earnings4 = ($i['earned'] / 4) + $i['available_withdrawal'];
    $earnings5 = ($i['earned'] / 5) + $i['available_withdrawal'];
    $total = $i['earned'] + $i['amount'] + $i['to_earn'];
    $status = $i['status'];
    $last = $i['last_updated'];
    $end = $i['end_date'];
    $curr = date('Y-m-d H:m:s');
    $duration = $i['durationInt'];
    $days = $i['num_of_days'];
    $added_day = $i['num_of_days'] + 1;
    $interval = time() - $i['last_updated'];

    if ($status == 'ended') {
        $modules->changeInvestStatus($id, 'ended');
    } elseif ($status == 'active') {
        if ($interval > 21600) {
            if ($days == $duration - 1) {
                $modules->investUp($id, $earned, time());
                $modules->investIncreaseDay($id, $added_day);
                $modules->changeInvestStatus($id, 'ended');
                $modules->investAvailableWithdraw($id, $total);
            } else {
                $modules->investUp($id, $earned, time());
                $modules->investIncreaseDay($id, $added_day);
                if ($days == 15 && $interval > 21600) {
                    $modules->changeInvestPhase($id, 'second');
                    $modules->investAvailableWithdraw($id, $earnings);
                } elseif ($days == 30 && $interval > 21600) {
                    $modules->changeInvestPhase($id, 'third');
                    $modules->investAvailableWithdraw($id, $earnings2);
                } elseif ($days == 45 && $interval > 21600) {
                    $modules->changeInvestPhase($id, 'fourth');
                    $modules->investAvailableWithdraw($id, $earnings3);
                } elseif ($days == 60 && $interval > 21600) {
                    $modules->changeInvestPhase($id, 'fifth');
                    $modules->investAvailableWithdraw($id, $earnings4);
                } elseif ($days == 75 && $interval > 21600) {
                    $modules->changeInvestPhase($id, 'sixth');
                    $modules->investAvailableWithdraw($id, $earnings5);
                }
            }
        }
    }
}
