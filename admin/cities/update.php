<?php

require_once '../../config.php';
require_once BLA . 'inc/header.php';
require_once BL . 'functions/validate.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $city_id = $_POST['city_id'];

    if (!check_empty($name)) {

        if (check_length($name, 3)) {

            $conn = new db;
            $city_row = $conn ->get_row('cities', 'id', $city_id);

            if($city_row){

                $success_messages[] = $conn->db_update('cities', ['name' => $name], 'id', $city_id);
                header("refresh:1;url=". BURLA . 'cities');

            }else{
               $error_messages[] = 'Your city not found!';
            }
        } else {
            $error_messages[] = "City name must be more than or equal 3 characthers!";
        }
    } else {
        $error_messages[] = "City Name Can't be empty";
    }

    require_once BL . 'functions/messages.php';
}

require_once BLA . 'inc/footer.php';
?>