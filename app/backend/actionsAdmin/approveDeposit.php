<?php

include '../adminModule.php';

if (isset($_POST['approveDeposit'])) {
    $id = $_POST['id'];
    $verified = 1;

    if ($adminModule->approveDeposit($id, $verified)) {
        header('location: ../../admin/deposits');
    }
}

if (isset($_POST['declineDeposit'])) {
    $id = $_POST['id'];
    $verified = 2;

    if ($adminModule->approveDeposit($id, $verified)) {
        header('location: ../../admin/deposits');
    }
}


if (isset($_POST['approveUserDeposit'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $verified = 1;

    if ($adminModule->approveDeposit($id, $verified)) {
        header("location: ../../admin/users/transactions.php?userid=$uid");
    }
}

if (isset($_POST['declineUserDeposit'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $verified = 2;

    if ($adminModule->approveDeposit($id, $verified)) {
        header("location: ../../admin/users/transactions.php?userid=$uid");
    }
}
