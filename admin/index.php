<?php

require_once '../config.php';
require_once BLA . 'inc/header.php';

?>

<div class="col-sm-6">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">All  Services</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="<?php echo BURLA.'services/' ?>" class="btn btn-primary"><?php $conn = new db; echo $conn->count_table('services'); ?></a>
    </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">All Cities</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="<?php echo BURLA.'cities/' ?>" class="btn btn-primary"><?php $conn = new db; echo $conn->count_table('cities'); ?></a>
    </div>
    </div>
</div>


<div class="col-sm-6 mt-5">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">All Orders</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="<?php echo BURLA.'orders/' ?>" class="btn btn-primary"><?php $conn = new db; echo $conn->count_table('orders'); ?></a>
    </div>
    </div>
</div>


<div class="col-sm-6 mt-5">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">All Orders This Day</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="<?php echo BURLA.'orders/orderToday.php' ?>" class="btn btn-primary"><?php $conn = new db; echo $conn->count_table('orders', [['create_time', '>', date('Y-m-d') ]]); ?></a>
    </div>
    </div>
</div>


<?php 
require_once BLA . 'inc/footer.php';
?>

