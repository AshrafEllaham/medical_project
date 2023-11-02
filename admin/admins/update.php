<?php

require_once '../../config.php';
require_once BLA . 'inc/header.php';
require_once BL . 'functions/validate.php';

if (isset($_POST['submit'])) {
    $admin_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (check_empty($name) || check_empty($email) || check_empty($password)) {

        $error_messages[] = 'All fileds are required!';
    } else {

        if (check_length($name, 3)){

            if (valid_email($email)) {

                if (check_length($password, 5)) {

                    $conn = new db;
                    $success_messages[] = $conn->db_update('admins', [
                        'name' => $name,
                        'email' => $email,
                        'password' => $password
                    ], 'id', $admin_id);
                    header("refresh:2;url=" . BURLA . "services");

                } else {
                    $error_messages[] = "Your password's must more than or equal 5 characthers!";
                }
            } else {
                $error_messages[] = 'Your email not valid!';
            }
        }else{
            $error_messages[] = 'Your name must more than or equal 3 characthers!';
        }
    }

    require_once BL . 'functions/messages.php';
}

require_once BLA . 'inc/footer.php';
