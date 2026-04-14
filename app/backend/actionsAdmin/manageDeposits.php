<?php
session_start();
include '../adminModule.php';

if (isset($_POST['updateDeposit'])) {
    $id = $_POST['id'];
    $deposit_amt = $_POST['deposit_amt'];
    $return_amt = $_POST['return_amt'];
    $currency = $_POST['currency'];
    $wallet = $_POST['wallet'];
    $datetime = $_POST['datetime'];
    $transaction_type = $_POST['transaction_type'];
    $approved = $_POST['status'];

    if ($adminModule->updateDeposit($id, $deposit_amt, $return_amt, $currency, $wallet, $datetime, $transaction_type, $approved)) {
        $_SESSION['msg'] = "Deposit updated successfully!";
    } else {
        $_SESSION['msg'] = "Error updating deposit.";
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
