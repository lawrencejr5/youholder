<?php

include 'module.php';

header('content-type: application/json');
// echo json_encode(['wallets' => $modules->getAllUserWallets(25)]);
// echo json_encode(['deposits' => $modules->getAllUserDeposits(25)]);
// echo json_encode(['withdrawals' => $modules->getAllUserWithdrawals(25)]);
// echo json_encode(['Total Deposits' => $modules->getTotalDeposits(25, "ETH")]);
// echo json_encode(['Total Withdrawals' => $modules->getTotalWithdrawals(25, 'BTC')]);
// echo json_encode(['last deposit' => $modules->getUserWalletsLastDeposit(25, 'ETH')]);
echo json_encode(['all transactions' => $modules->allTransactions(25, 'BTC')]);
// echo json_encode(['total' => $modules->total(25, 1)]);
