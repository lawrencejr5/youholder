<?php

include 'module.php';

header('content-type: application/json');
echo json_encode(['wallets' => $modules->getAllUserWallets(25)]);
echo json_encode(['deposits' => $modules->getAllUserDeposits(25)]);
echo json_encode(['wallet amount' => $modules->getAllUserWalletsAmount(25, 3)]);
echo json_encode(['last deposit' => $modules->getUserWalletsLastDeposit(25, 2)]);
