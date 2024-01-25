<?php

session_start();
include '../module.php';

if (isset($_POST['verify_document'])) {
    $id = $_SESSION['id'];
    $type = $_POST['identity_type'];
    $number = $_POST['identity_number'];

    $file_name1 = $_FILES['identity_file_front']['name'];
    $file_name2 = $_FILES['identity_file_back']['name'];

    $file_tmp_name1 = $_FILES['identity_file_front']['tmp_name'];
    $file_tmp_name2 = $_FILES['identity_file_back']['tmp_name'];

    $file_size1 = $_FILES['identity_file_front']['size'];
    $file_size2 = $_FILES['identity_file_back']['size'];

    $file_ext1 = explode('.', $file_name1);
    $file_ext2 = explode('.', $file_name2);

    $ext1 = end($file_ext1);
    $ext2 = end($file_ext2);

    $allowed = ['jpg', 'jpeg', 'png', 'svg', 'jfif', 'bmp', 'gif'];

    $front = $file_ext1[0] . '-' . time() . '.' . $ext1;
    $back = $file_ext2[0] . '-' . time() . '.' . $ext2;

    $path1 = './uploads/' . $front;
    $path2 = './uploads/' . $back;

    if (in_array($ext1, $allowed) && in_array($ext2, $allowed)) {
        if (move_uploaded_file($file_tmp_name1, $path1) && move_uploaded_file($file_tmp_name2, $path2)) {
            $modules->uploadPersonalVerification($id, $type, $number, $front, $back);
            header('location: ../../personal-verification');
        } else {
            echo '<script>alert("Error")</script>';
        }
    } else {
        echo '<script>alert("File not format")</script>';
    }
}
