<?php

include '../module.php';

if (isset($_POST['fname'])) {
    $response = [];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $otp = rand(100000, 999999);

    $registered = $modules->register($fname, $lname, $email, $phone, $pass, $otp);

    if ($registered == 'exists') {
        $response['header'] = 'exists';
    } elseif ($registered == 'chuwa') {
        $response['header'] = 'good';
    }
    // elseif ($registered == "email_not_valid") {
    //     $response['header'] = 'email_not_valid';
    // }
    echo json_encode($response);
}
