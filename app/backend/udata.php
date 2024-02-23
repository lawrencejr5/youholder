<?php

session_start();

include 'module.php';

$data = [];
$uID = $_SESSION['id'];



// User info
$data['user'] = $modules->getUserData($uID);
foreach ($data['user'] as $u) {
    $fname = $u['fname'];
    $lname = $u['lname'];
    $fullname = $u['fname'] . ' ' . $u['lname'];
    $email = $u['email'];
    $phone = $u['phone'];
    $profile_pic = $u['profile_pic'];
    $address1 = $u['address1'];
    $address2 = $u['address2'];
    $city = $u['city'];
    $state = $u['state'];
    $country = $u['country'];
    $timezone = $u['timezone'];
    $level = $u['level'];
    $admin = $u['admin'];
}


// Other data
$data['wallets'] = $modules->getAllWallets();
$data['user_wallets'] = $modules->getAllUserWallets($uID);
$data['user_walletsL'] = $modules->getAllUserWalletsL($uID);
$data['withdrawals'] = $modules->getAllUserWithdrawals($uID);
$data['deposits'] = $modules->getAllUserDeposits($uID);
$data['transactions'] = $modules->allTransactions($uID, 25);
$data['latest_transactions'] = $modules->allTransactions($uID, 10);
$data['personal_documents'] = $modules->getUserPersonalDocuments($uID);
$data['staking_plans'] = $modules->getStakingPlans();
$data['myStakes'] = $modules->getStakes($uID);
$data['invest_plans'] = $modules->getInvestPlans();
$data['myInvestments'] = $modules->getInvestments($uID);
$data['last_transaction'] = $modules->getLastTransaction($uID);
