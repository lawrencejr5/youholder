<?php

session_start();
if (!$_SESSION['id']) {
    header('location: ../../../login');
} elseif ($_SESSION['admin'] == 0) {
    header('location: ../../dashboard');
}
include 'adminModule.php';

$data = [];
$aID = $_SESSION['id'];



// User info
$data['admin'] = $adminModule->fetchAdmin(1, $aID);
foreach ($data['admin'] as $a) {
    $fname = $a['fname'];
    $lname = $a['lname'];
    $fullname = $a['fname'] . ' ' . $a['lname'];
    $email = $a['email'];
    $phone = $a['phone'];
    $profile_pic = $a['profile_pic'];
    $address1 = $a['address1'];
    $address2 = $a['address2'];
    $city = $a['city'];
    $state = $a['state'];
    $country = $a['country'];
    $timezone = $a['timezone'];
    $level = $a['level'];
    $admin = $a['admin'];
}


$data['users'] = $adminModule->fetchAllUserAccounts();
$data['transactions'] = $adminModule->fetchAllTransactions();
$data['deposits'] = $adminModule->fetchAllDeposits('deposit');
$data['withdrawals'] = $adminModule->fetchAllWithdrawals('withdrawal');
$data['transfers'] = $adminModule->fetchAllTransfers('transfer from');
$data['exchanges'] = $adminModule->fetchAllExchanges('exchange from', 'exchange to');
$data['documents'] = $adminModule->fetchAllUserDocuments();
$data['stakings'] = $adminModule->fetchAllStakes();
$data['investments'] = $adminModule->fetchAllInvests();



// Rowcount

$numOfTransactions = $adminModule->numOfDeposits() + $adminModule->numOfWithdrawals();
$numOfUsers = $adminModule->numOfUsers();
$numOfStakes = $adminModule->numOfStakes();
$numOfInvests = $adminModule->numOfInvests();
