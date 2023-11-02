<?php

require_once '../../config.php';
require_once BLA . 'inc/header.php';
require_once BL . 'functions/validate.php';
require_once BL . 'functions/db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];


    if (check_empty($name) || check_empty($email) || check_empty($password)) {

        $error_messages[] = 'All fileds are required!';
    } else {

        if (check_length($name, 3)){

            if (valid_email($email)) {

                if (check_length($password, 5)) {

                    $conn = new db;
                    $success_messages[] = $conn->db_insert('admins', [
                        'name' => $name,
                        'password' => $password,
                        'email' => $email,
                        'type' => $type
                    ]);

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

?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name </label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Email </label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Type </label>
            <select name="type" class="form-control">
                <option value="Admin" selected>Admin</option>
                <option value="Super Admin">Super Admin</option>
            </select>
        </div>


        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>
</div>

<?php
require_once BLA . 'inc/footer.php';
?>