<?php
include '../adminModule.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    if ($adminModule->deleteStake($id)) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
