<?php

session_start();

include 'module.php';

$data = [];
$uID = $_SESSION['id'];
$data['user'] = $modules->getUserData($uID);



foreach ($data['user'] as $u) {
    $fname = $u['fname'];
    $lname = $u['lname'];
    $fullname = $u['fname'] . ' ' . $u['lname'];
    $email = $u['email'];
    $phone = $u['phone'];
    $address1 = $u['address1'];
    $address2 = $u['address2'];
    $city = $u['city'];
    $state = $u['state'];
    $country = $u['country'];
    $timezone = $u['timezone'];
}
