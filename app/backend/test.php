<?php

include 'module.php';
// include 'adminModule.php';
header('content-type: application/json');
// echo json_encode(['wallets' => $modules->getAllUserWallets(25)]);
// echo json_encode(['deposits' => $modules->getAllUserDeposits(25)]);
// echo json_encode(['withdrawals' => $modules->getAllUserWithdrawals(25)]);
// echo json_encode(['Total Deposits' => $modules->getTotalDeposits(25, "ETH")]);
// echo json_encode(['Total Withdrawals' => $modules->getTotalWithdrawals(25, 'BTC')]);
// echo json_encode(['last deposit' => $modules->getUserWalletsLastDeposit(25, 'ETH')]);
// echo json_encode(['all transactions' => $modules->allTransactions(25, 'BTC')]);
// echo json_encode(['total' => $modules->total(25, 1)]);
echo json_encode(['total' => $modules->getLastTransaction(25)]);
// echo json_encode(['admins' => $adminModule->fetchAllAdminAccounts(1)]);
// echo json_encode(['deposits' => $adminModule->fetchAllDeposits('deposit')]);
// echo json_encode(['withdrawals' => $adminModule->fetchAllWithdrawals('withdrawal')]);
// echo json_encode(['success' => true, 'data' => $adminModule->fetchAllTransfers('transfer from')]);
// echo json_encode(['success' => true, 'data' => $adminModule->fetchAllExchanges('exchange from', 'exchange to')]);
// echo json_encode(['success' => true, 'data' => $adminModule->fetchAllUserDocuments()]);
// echo json_encode(['success' => true, 'datum' => $adminModule->getUserExchanges('transfer from', 'transfer to', 25)]);
// echo json_encode(['success' => true, 'datum' => $adminModule->getUserWallets(26)]);
// echo json_encode(['success' => true, 'data' => $modules->getStakingPlans()]);
// echo json_encode(['success' => true, 'datum' => $modules->getStakingPlan(2)]);
// echo json_encode(['success' => true, 'stakings' => $adminModule->fetchAllStakes()]);
// echo json_encode(['success' => true, 'investments' => $adminModule->fetchAllInvests()]);
// echo json_encode(['success' => true, 'stakings' => $adminModule->getUserStakes(25)]);
// echo json_encode(['success' => true, 'investments' => $adminModule->getUserInvests(25)]);
// echo json_encode(['success' => true, 'wallets' => $adminModule->getUserWallets(25)]);

// $date = '0000-00-00';

// $date1 = new DateTime($date);
// $date2 = new DateTime('2024-03-13');

// $interval = $date1->diff($date2);
// $last_updated = 1707425661;
// $next_days = strtotime('2024-03-13');
// $curr_date = time();
// $interval = $next_days - $curr_date;
// echo floor($interval / (60 * 60 * 24));
