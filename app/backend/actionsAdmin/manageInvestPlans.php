<?php
include '../adminModule.php';
session_start();

if (isset($_POST['addInvestPlan'])) {
    $plan = $_POST['plan'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $monthly = $_POST['monthly'];
    $duration = $_POST['duration'];
    $dura = $_POST['dura'];

    if ($adminModule->addInvestPlan($plan, $min, $max, $monthly, $duration, $dura)) {
        $_SESSION['msg'] = "Investment plan added successfully";
    } else {
        $_SESSION['msg'] = "Error adding investment plan";
    }
    header("location: ../../admin/plans/investment.php");
}

if (isset($_POST['updateInvestPlan'])) {
    $id = $_POST['id'];
    $plan = $_POST['plan'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $monthly = $_POST['monthly'];
    $duration = $_POST['duration'];
    $dura = $_POST['dura'];

    if ($adminModule->updateInvestPlan($id, $plan, $min, $max, $monthly, $duration, $dura)) {
        $_SESSION['msg'] = "Investment plan updated successfully";
    } else {
        $_SESSION['msg'] = "Error updating investment plan";
    }
    header("location: ../../admin/plans/investment.php");
}

if (isset($_POST['deleteInvestPlan'])) {
    $id = $_POST['id'];
    if ($adminModule->deleteInvestPlan($id)) {
        $_SESSION['msg'] = "Investment plan deleted successfully";
    } else {
        $_SESSION['msg'] = "Error deleting investment plan";
    }
    header("location: ../../admin/plans/investment.php");
}
