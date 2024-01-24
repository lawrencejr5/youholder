<?php

include '../module.php';

session_start();


if (isset($_POST['email'])) {
    $response = [];
    $data = [];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $login = $modules->login($email, $pass);
    if ($login->rowCount() == 1) {
        $data['user'] = $login->fetchAll();
        foreach ($data['user'] as $u) {
            $_SESSION['id'] = $u['id'];
            $_SESSION['fname'] = $u['fname'];
            $_SESSION['lname'] = $u['lname'];
            $_SESSION['email'] = $u['email'];
            $_SESSION['phone'] = $u['phone'];
            $_SESSION['address1'] = $u['address1'];
            $_SESSION['address2'] = $u['address2'];
            $_SESSION['country'] = $u['country'];
            $_SESSION['city'] = $u['city'];
            $_SESSION['state'] = $u['state'];
            $_SESSION['timezone'] = $u['timezone'];
        }
        $response['header'] = 'signin';
    } elseif ($login->rowCount() == 0) {
        $response['header'] = 'error';
    }

    echo json_encode($response);
}
