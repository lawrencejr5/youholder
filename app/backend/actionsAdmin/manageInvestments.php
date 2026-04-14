<?php
session_start();
include '../adminModule.php';

if (isset($_POST['updateInvestment'])) {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $to_earn = $_POST['to_earn'];
    $earned = $_POST['earned'];
    $expected = $_POST['expected'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    if ($adminModule->updateInvestment($id, $amount, $to_earn, $earned, $expected, $start_date, $end_date, $status)) {
        $_SESSION['msg'] = "Investment updated successfully!";
    } else {
        $_SESSION['msg'] = "Error updating investment.";
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
