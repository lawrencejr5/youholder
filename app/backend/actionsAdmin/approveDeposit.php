<?php

include '../adminModule.php';

if (isset($_POST['approveDeposit'])) {
    $id1 = $_POST['id'];
    $uid1 = $_POST['uid'];
    $curr1 = $_POST['currency'];
    $amount1 = $_POST['return_amt'] * 0.1;
    $wallet1 = $_POST['wallet'];
    $wallet_id1 = $_POST['wallet_id'];
    $type1 = "ref bonus";
    $verified1 = 1;

    if ($adminModule->approveDeposit($id1, $verified1)) {
        $user1 = $adminModule->getUserData($uid1);
        $acc1 = $user1[0]["referer"];
        
        if($acc1){
            $userdata1 = $adminModule->getUserByAcc($acc1);
            $from_to1 = $user1[0]["lname"] . " " . $user1[0]["fname"];
            $adminModule->addRefBonus($userdata1[0]["id"], $wallet_id1, $wallet1, $curr1, $amount1, $amount1, $type1, $verified1, $from_to1);
        }
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
    $curr = $_POST['currency'];
    $amount = $_POST['return_amt'] * 0.1;
    $wallet = $_POST['wallet'];
    $wallet_id = $_POST['wallet_id'];
    $type = "ref bonus";
    $verified = 1;
    

    if ($adminModule->approveDeposit($id, $verified)) {
        $user = $adminModule->getUserData($uid);
        $acc = $user[0]["referer"];
        
        if($acc){
            $userdata = $adminModule->getUserByAcc($acc);
            $from_to = $user[0]["lname"] . " " . $user[0]["fname"];
            $adminModule->addRefBonus($userdata[0]["id"], $wallet_id, $wallet, $curr, $amount, $amount, $type, $verified, $from_to);
        }
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['declineUserDeposit'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $verified = 2;

    if ($adminModule->approveDeposit($id, $verified)) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
