<?php


include '../adminModule.php';

if (isset($_POST['delWallet'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    if ($adminModule->deleteWallet($id)) {
        header("location: ../../admin/users/wallets.php?userid=$uid");
    }
}
