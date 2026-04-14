<?php
session_start();
include '../adminModule.php';

if (isset($_POST['updateStake'])) {
    $id = $_POST['id'];
    $staked = $_POST['staked'];
    $expected = $_POST['expected'];
    $daily_earned = $_POST['daily_earned'];
    $earned = $_POST['earned'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    if ($adminModule->updateStake($id, $staked, $expected, $daily_earned, $earned, $start_date, $end_date, $status)) {
        $_SESSION['msg'] = "Stake updated successfully!";
    } else {
        $_SESSION['msg'] = "Error updating stake.";
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
