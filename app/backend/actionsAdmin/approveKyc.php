<?php

include '../adminModule.php';

if (isset($_POST['approveKyc'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $level = 3;
    $verified = 1;

    if ($adminModule->approveKyc($id, $verified)) {
        if ($adminModule->upLevel($uid, $level)) {
            header('location: ../../admin/kyc');
        }
    }
}

if (isset($_POST['declineKyc'])) {
    $id = $_POST['id'];
    $verified = 2;

    if ($adminModule->approveKyc($id, $verified)) {
        header('location: ../../admin/kyc');
    }
}
