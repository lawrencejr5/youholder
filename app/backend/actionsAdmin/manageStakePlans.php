<?php
include '../adminModule.php';
session_start();

if (isset($_POST['addStakePlan'])) {
    $plan = $_POST['plan'];
    $crypto = $_POST['crypto'];
    $apy = $_POST['apy'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $max_val = $_POST['max_val'];

    if ($adminModule->addStakePlan($plan, $crypto, $apy, $min, $max, $max_val)) {
        $_SESSION['msg'] = "Stake plan added successfully";
    } else {
        $_SESSION['msg'] = "Error adding stake plan";
    }
    header("location: ../../admin/plans/stakes.php");
}

if (isset($_POST['updateStakePlan'])) {
    $id = $_POST['id'];
    $plan = $_POST['plan'];
    $crypto = $_POST['crypto'];
    $apy = $_POST['apy'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $max_val = $_POST['max_val'];

    if ($adminModule->updateStakePlan($id, $plan, $crypto, $apy, $min, $max, $max_val)) {
        $_SESSION['msg'] = "Stake plan updated successfully";
    } else {
        $_SESSION['msg'] = "Error updating stake plan";
    }
    header("location: ../../admin/plans/stakes.php");
}

if (isset($_POST['deleteStakePlan'])) {
    $id = $_POST['id'];
    if ($adminModule->deleteStakePlan($id)) {
        $_SESSION['msg'] = "Stake plan deleted successfully";
    } else {
        $_SESSION['msg'] = "Error deleting stake plan";
    }
    header("location: ../../admin/plans/stakes.php");
}
