<?php
include '../module.php';
session_start();

if (isset($_POST['fname'])) {
    $response = [];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $timezone = $_POST['timezone'];

    $updatedProfile = $modules->updateProfile($fname, $lname, $phone, $address1, $address2, $city, $state, $country, $timezone, $_SESSION['id']);

    if ($updatedProfile) {
        $response['header'] = 'updated';
    } else {
        $response['header'] = "error";
    }
    echo json_encode($response);
}
