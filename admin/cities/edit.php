<?php

require_once '../../config.php';
require_once BLA . 'inc/header.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $conn = new db;
    $city_row = $conn ->get_row('cities', 'id', $_GET['id']);

    if($city_row){
        $city_id = $city_row['id'];
    }else{
        header("Location:" . BURLA);
    }

}else{
    header("Location: ". BURLA);
}


?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit City</h3>
    <form method="post" action="<?php echo BURLA . 'cities/update.php'; ?>">
        <div class="form-group">
            <label>Name Of City</label>
            <input type="text" name="name" class="form-control" value="<?php echo isset($city_row['name']) ? $city_row['name'] : ''; ?>">
            <input type="hidden" value="<?php echo $city_id; ?>" name="city_id">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>

<?php
require_once BLA . 'inc/footer.php';
?>