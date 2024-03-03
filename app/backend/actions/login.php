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
        if ($modules->checkEmailVerified($email) == '1') {
            $data['user'] = $login->fetchAll();
            foreach ($data['user'] as $u) {
                $_SESSION['id'] = $u['id'];
                $_SESSION['admin'] = $u['admin'];
            }
            $response['header'] = 'signin';
        } else {
            $response['header'] = 'not_verified';
        }
    } elseif ($login->rowCount() == 0) {
        $response['header'] = 'error';
    }

    echo json_encode($response);
}
