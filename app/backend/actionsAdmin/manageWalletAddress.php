<?php
session_start();
include '../adminModule.php';

if (isset($_POST['addWalletAddress'])) {
    $currency = $_POST['currency'];
    $address = $_POST['address'];
    $network = $_POST['network'];

    if ($adminModule->addWalletAddress($currency, $address, $network)) {
        $_SESSION['msg'] = "Wallet address added successfully!";
    } else {
        $_SESSION['msg'] = "Error adding wallet address.";
    }
    header('location: ../../admin/wallets');
    exit;
}

if (isset($_POST['updateWalletAddress'])) {
    $id = $_POST['id'];
    $currency = $_POST['currency'];
    $address = $_POST['address'];
    $network = $_POST['network'];

    if ($adminModule->updateWalletAddress($id, $currency, $address, $network)) {
        $_SESSION['msg'] = "Wallet address updated successfully!";
    } else {
        $_SESSION['msg'] = "Error updating wallet address.";
    }
    header('location: ../../admin/wallets');
    exit;
}
