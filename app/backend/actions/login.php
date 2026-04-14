<?php

include '../module.php';
include '../mailer.php';

session_start();


if (isset($_POST['email'])) {
    $response = [];
    $data = [];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $login = $modules->login($email, $pass);
    if ($login->rowCount() == 1) {
        $user = $login->fetch(PDO::FETCH_ASSOC);
        if ($user['verified'] == '1') {
            $_SESSION['id'] = $user['id'];
            $_SESSION['admin'] = $user['admin'];
            $response['header'] = 'signin';
        } elseif ($user['verified'] == '2') {
            $response['header'] = 'blocked';
        } else {
            $response['header'] = 'not_verified';
        }
    } elseif ($login->rowCount() == 0) {
        $response['header'] = 'error';
    }

    echo json_encode($response);
}
