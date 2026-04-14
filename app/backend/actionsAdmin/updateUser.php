<?php

include '../adminModule.php';


if (isset($_POST['updateProfile'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $verified = $_POST['verified'];

    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($cpassword)) {
        echo "<script>alert('An error occured, please fill required fields')</script>";
    } elseif ($password !== $cpassword) {
        echo "<script>alert('An error occured, passwords do not match')</script>";
    } else {
        if ($adminModule->updateUser($id, $fname, $lname, $email, $phone, $country, $state, $city, $address1, $address2, $password, $verified)) {
            session_start();
            $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                User profile updated successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header("location: ../../admin/users/profile.php?userid=$id");
        }
    }
}
