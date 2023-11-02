<?php

require_once '../config.php';
require_once BL . 'functions/validate.php';

if(isset($_SESSION['admin_name']))
{
    header("location:" . BURLA);
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css">

    <title>Dashboard | Login</title>
</head>

<body>

    <div class="cont-login d-flex align-items-center justify-content-around">

        <?php
            if (isset($_POST['submit'])) {
                
                $password = $_POST['password'];
                $email = $_POST['email'];

                if (!check_empty($email) && !check_empty($password)) {

                    if (valid_email($email)) {

                        $conn = new db;
                        $check = $conn->get_row('admins', 'email', $email);

                        if ($check) {

                            if ($password == $check['password']) {
                                
                                $_SESSION['admin_name'] = $check['name'];
                                $_SESSION['admin_email'] = $check['email'];
                                $_SESSION['admin_id'] = $check['id'];
                                $_SESSION['admin_type'] = $check['type'];

                                header("location:" . BURLA);

                            } else {

                                $error_messages[] = "Worng Password!";
                            }
                        } else {

                            $error_messages[] = "Wrong Email";
                        }
                    } else {

                        $error_messages[] = "Your email is invalid!";
                    }
                } else {

                    $error_messages[] = "All fields are requires!";
                }
            }

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5">
            <div class="row">

                <?php require BL . 'functions/messages.php'; ?>
                <div class="col-sm-12  ">
                    <h3 class="text-center p-3 text-white">Login</h3>
                </div>
                <div class="col-sm-6 offset-sm-3 ">
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password </label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">

                        <input type="submit" name="submit" class="form-control btn btn-success">
                    </div>
                </div>
            </div>

        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/popper.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js"></script>




</body>

</html>