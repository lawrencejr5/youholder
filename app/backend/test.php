<?php

// include 'module.php';
include 'adminModule.php';
header('content-type: application/json');
// echo json_encode(['wallets' => $modules->getAllUserWallets(25)]);
// echo json_encode(['deposits' => $modules->getAllUserDeposits(25)]);
// echo json_encode(['withdrawals' => $modules->getAllUserWithdrawals(25)]);
// echo json_encode(['Total Deposits' => $modules->getTotalDeposits(25, "ETH")]);
// echo json_encode(['Total Withdrawals' => $modules->getTotalWithdrawals(25, 'BTC')]);
// echo json_encode(['last deposit' => $modules->getUserWalletsLastDeposit(25, 'ETH')]);
// echo json_encode(['all transactions' => $modules->allTransactions(25, 'BTC')]);
// echo json_encode(['total' => $modules->total(25, 1)]);
// echo json_encode(['admins' => $adminModule->fetchAllAdminAccounts(1)]);
// echo json_encode(['deposits' => $adminModule->fetchAllDeposits('deposit')]);
// echo json_encode(['withdrawals' => $adminModule->fetchAllWithdrawals('withdrawal')]);
// echo json_encode(['success' => true, 'data' => $adminModule->fetchAllTransfers('transfer from')]);
// echo json_encode(['success' => true, 'data' => $adminModule->fetchAllExchanges('exchange from', 'exchange to')]);
// echo json_encode(['success' => true, 'data' => $adminModule->fetchAllUserDocuments()]);
// echo json_encode(['success' => true, 'datum' => $adminModule->getUserExchanges('transfer from', 'transfer to', 25)]);
echo json_encode(['success' => true, 'datum' => $adminModule->getUserWallets(26)]);
