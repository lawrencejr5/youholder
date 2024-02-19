<?php


include "../adminModule.php";

if (isset($_POST['unstake'])) {
    $status = 'unstaked';
    $id = $_POST['id'];
    $uid = $_POST['uid'];

    if ($adminModule->unstake($id, $status)) {
        header("location: ../../admin/users/stakes.php?userid=$uid");
    }
}
