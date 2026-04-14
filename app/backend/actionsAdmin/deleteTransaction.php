<?php
session_start();
include '../adminModule.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $type = strtolower(trim($_POST['transaction_type']));
    $success = false;

    switch ($type) {
        case "deposit":
        case "exchange to":
        case "transfer to":
        case "ref bonus":
        case "investment return":
        case "stake return":
            if ($adminModule->deleteDeposit($id))
                $success = true;
            break;
        case "withdrawal":
        case "exchange from":
        case "transfer from":
            if ($adminModule->deleteWithdrawal($id))
                $success = true;
            break;
        case "investment":
            if ($adminModule->deleteInvestment($id))
                $success = true;
            break;
        case "staking":
            if ($adminModule->deleteStake($id))
                $success = true;
            break;
        case "kyc":
            if ($adminModule->deleteKyc($id))
                $success = true;
            break;
        default:
            // Log that the type was not recognized
            $_SESSION['msg'] = "Error: Unrecognized transaction type: " . $type;
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
    }

    if ($success === true) {
        $_SESSION['msg'] = ucfirst($type) . " deleted successfully!";
    } else {
        $_SESSION['msg'] = "Error: Could not delete " . $type . ". Record might not exist.";
    }

    header('location: ' . $_SERVER['HTTP_REFERER']);
}