<?php
session_start();
include '../adminModule.php';

if (isset($_POST['updateWithdrawal'])) {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $wallet_name = $_POST['wallet_name'];
    $crypto_address = $_POST['crypto_address'];
    $datetime = $_POST['datetime'];
    $transaction_type = $_POST['transaction_type'];
    $from_to = $_POST['from_to'];
    $verified = $_POST['status'];

    if ($adminModule->updateWithdrawal($id, $amount, $wallet_name, $crypto_address, $datetime, $transaction_type, $from_to, $verified)) {
        $_SESSION['msg'] = "Withdrawal updated successfully!";
    } else {
        $_SESSION['msg'] = "Error updating withdrawal.";
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
