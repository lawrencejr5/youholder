<?php
include '../module.php';
session_start();

if ($_POST['newPass']) {
    $response = [];

    $newPass = $_POST['newPass'];
    $oldPass = $_POST['oldPass'];

    $passUpdated = $modules->updatePassword($oldPass, $newPass, $_SESSION['id']);

    if ($passUpdated) {
        $response['header'] = "updated";
    } else {
        $response['header'] = "failed";
    }
    echo json_encode($response);
}
