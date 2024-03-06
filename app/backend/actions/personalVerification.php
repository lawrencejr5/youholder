<?php

session_start();
include '../module.php';
include '../mailer.php';

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

    $data['user'] = $modules->getUserData($_SESSION['id']);
    foreach ($data['user'] as $u) {
        $email = $u['email'];
        $fname = $u['fname'];
    }

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Portfolio Level Upgrade | Yield Financial Services</title>
            </head>
            <body>
                <center>
                    <img src='https://yieldfincs.com/youholder/public/logos/yield-logo.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that your account details have been updated and you have your portfolio has been upgraded to Level 3. This means that your portfolio would no longer be restricted from making Stakings.</p>
               <p>Congratulations!! You can now enoy the full benefits of our platform.</p>
               <p>You can <a href='https://yieldfincs.com/youholder/login'>login</a> to perform more actions on your account.</p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly let us know so that we can terminate this process.</p>
               <center>
                    <a href='https://yieldfincs.com/youholder/t&c'>Terms and condtions</a> | 
                    <a href='https://yieldfincs.com/youholder/policy'>Privacy Policy</a>
               </center>
            </body>
        </html>
    ";


    if (in_array($ext1, $allowed) && in_array($ext2, $allowed)) {
        if (move_uploaded_file($file_tmp_name1, $path1) && move_uploaded_file($file_tmp_name2, $path2)) {
            $modules->uploadPersonalVerification($id, $type, $number, $front, $back);
            header('location: ../../personal-verification');
            $mailer->sendMyMail($email, $fname, 'Portfolio Level Upgrade', $body);
        } else {
            echo '<script>alert("Error")</script>';
        }
    } else {
        echo '<script>alert("File not format")</script>';
    }
}
