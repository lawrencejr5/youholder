<?php

include '../adminModule.php';

if (isset($_POST['approveWithdrawal'])) {
    $id = $_POST['id'];
    $verified = 1;

    if ($adminModule->approveWithdrawal($id, $verified)) {
        header('location: ../../admin/withdrawals');
    }
}

if (isset($_POST['declineWithdrawal'])) {
    $id = $_POST['id'];
    $verified = 2;

    if ($adminModule->approveWithdrawal($id, $verified)) {
        header('location: ../../admin/withdrawals');
    }
}


if (isset($_POST['approveUserWithdrawal'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $verified = 1;

    if ($adminModule->approveWithdrawal($id, $verified)) {
        header("location: ../../admin/users/transactions.php?userid=$uid");
    }
}

if (isset($_POST['declineUserWithdrawal'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $verified = 2;

    if ($adminModule->approveWithdrawal($id, $verified)) {
        header("location: ../../admin/users/transactions.php?userid=$uid");
    }
}
