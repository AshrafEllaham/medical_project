<?php

require_once '../../config.php';
require_once BLA . 'inc/header.php';
require_once BL . 'functions/validate.php';

if (isset($_POST['submit'])) {

    $serv_id = $_POST['id'];
    $name = $_POST['name'];

    if (!check_empty($name)) {

        if (check_length($name, 3)) {

            $conn = new db;
            $success_messages[] = $conn->db_update('services', ['name' => $name], 'id', $serv_id);
            header("refresh:2;url=" . BURLA . "services");

        } else {

            $error_messages[] = "service's name must be more than or equal 3 characthers!";
        }
    } else {

        $error_messages[] = "Please Type Service Name";
    }

    require_once BL . 'functions/messages.php';
}


require_once BLA . 'inc/footer.php';  
 
?>