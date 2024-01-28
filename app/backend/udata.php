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
}


// Other data
$data['wallets'] = $modules->getAllWallets();
$data['user_wallets'] = $modules->getAllUserWallets($uID);
$data['user_walletsL'] = $modules->getAllUserWalletsL($uID);


$data['personal_documents'] = $modules->getUserPersonalDocuments($uID);
