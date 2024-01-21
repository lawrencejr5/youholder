<?php

include '../module.php';

if (isset($_POST['fname'])) {
    $response = [];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $registered = $modules->register($fname, $lname, $email, $phone, $pass);

    if ($registered == "exists") {
        $response['header'] = 'exists';
    } elseif ($registered == "chuwa") {
        $response['header'] = 'good';
    }
    echo json_encode($response);
}
