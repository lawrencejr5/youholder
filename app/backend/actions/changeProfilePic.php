<?php
include '../module.php';
session_start();

if (isset($_POST['apply_pic'])) {
    $id = $_SESSION['id'];
    $file_name = $_FILES['profile_pic']['name'];
    $file_tmp_name = $_FILES['profile_pic']['tmp_name'];
    $file_size = $_FILES['profile_pic']['size'];
    $file_ext = explode('.', $file_name);
    $ext = end($file_ext);
    $allowed = ['jpg', 'jpeg', 'png', 'svg', 'jfif', 'bmp', 'gif'];
    $profile_pic = $file_ext[0] . '-' . time() . '.' . $ext;
    $path = './uploads/' . $profile_pic;

    if (in_array($ext, $allowed)) {
        if (move_uploaded_file($file_tmp_name, $path)) {
            $updated = $modules->updateProfilePic($profile_pic, $id);
            header('location: ../../profile');
        } else {
            echo '<script>alert("Error")</script>';
        }
    } else {
        echo '<script>alert("File not format")</script>';
    }
}
