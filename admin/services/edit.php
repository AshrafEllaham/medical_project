<?php 

require_once '../../config.php';
require_once BLA . 'inc/header.php';
require_once BL . 'functions/validate.php'; 

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {

        $conn = new db;
        $row = $conn->get_row('services', 'id', $_GET['id']);

        if (!$row) {
            header("location:" . BURL);
        }

        $serv_id = $row['id'];
    } else {
        header("location:" . BURLA);
    }

?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit Service</h3>
    <form method="post" action="<?php echo BURLA . 'services/update.php'; ?>">
        <div class="form-group">
            <label>Name Of Service</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
            <input type="hidden" name="id" value="<?php echo $serv_id; ?>" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>


<?php require_once BLA . 'inc/footer.php';  ?>