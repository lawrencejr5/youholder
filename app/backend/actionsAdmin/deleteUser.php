<?php
session_start();
include '../adminModule.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $adminModule->deleteUser($id);
    if ($result) {
        $_SESSION['msg'] = "User was deleted successfully.";
    } else {
        $_SESSION['msg'] = "Failed to delete user.";
    }
    // Since we delete the user, we redirect to users list
    header("Location: ../../admin/users/");
    exit;
}
