<?php

require_once '../../config.php';
require_once BLA . 'inc/header.php';
require_once BL . 'functions/validate.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    if (!check_empty($name)) {

        if (check_length($name, 3)) {

            $conn = new db;
            $success_messages[] = $conn->db_insert('services', ['name' => $name]);

        } else {
            $error_messages[] = "Service's name must be more than or equal 3 characthers!";
        }
    } else {
        $error_messages[] = "Please Type Service Name";
    }

    require BL . 'functions/messages.php';
}

?>


<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New Service</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name Of Service</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>


<?php require_once BLA . 'inc/footer.php';  ?>