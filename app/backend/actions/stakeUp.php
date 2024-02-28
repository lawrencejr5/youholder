<?php

include '../module.php';


$data['stakes'] = $modules->getAllStakes();

foreach ($data['stakes'] as $s) {
    $id = $s['id'];
    $earned = $s['earned'] + $s['daily_earned'];
    $end = $s['end_date'];
    $stat = $s['status'];
    $interval = time() - $s['last_updated'];
    $num_of_days = $s['num_of_days'] + 1;
    $days_until_withdrawal = $s['days_until_withdrawal'] - 1;
    $available_withdrawal = $s['available_withdrawal'] + $s['daily_earned'];
    $capital_available_withdrawal = $s['available_withdrawal'] + $s['staked'];
    $dura = '365';

    if (($stat == 'ended' || $stat == 'unstaked') && $interval >= 21600) {
        if ($s['days_until_withdrawal'] == 1) {
            $modules->stakeReduceWithdrawDay($id, $days_until_withdrawal, time());
            if ($s['capital_returned'] == 0) {
                if ($modules->stakeAvailableWithdrawal($id, $capital_available_withdrawal)) {
                    $modules->stakeCapitalReturned($id);
                }
            }
        } else {
            $modules->stakeReduceWithdrawDay($id, $days_until_withdrawal, time());
        }
    } elseif ($stat == 'staking' && $interval >= 21600) {
        if ($s['num_of_days'] == '364') {
            $modules->stakeUp($id, $earned, time());
            $modules->stakeAvailableWithdrawal($id, $available_withdrawal);
            $modules->stakeAddDay($id, $num_of_days);
            $modules->stakeStat($id, 'ended');
        } else {
            $modules->stakeUp($id, $earned, time());
            $modules->stakeAvailableWithdrawal($id, $available_withdrawal);
            $modules->stakeAddDay($id, $num_of_days);
        }
    }
}
