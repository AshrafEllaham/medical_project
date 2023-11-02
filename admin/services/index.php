<?php 

require_once '../../config.php'; 
require_once BLA.'inc/header.php';  

?>

    <div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">View All Services</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
       
                </tr>
            </thead>
            <tbody>
                <?php 
                    $conn = new db;
                    $data = $conn->get_rows('services');
                    $x=1; 
                    foreach($data as $row){   
                ?>
                <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"> <?php echo $row['name'] ?> </td>
                    <td class="text-center">
                        <a href="<?php echo BURLA.'services/edit.php?id='.$row['id']; ?>" class="btn btn-info">Edit</a>
                        <a class="btn btn-danger delete" data-field="id" data-id="<?php echo $row['id']; ?>" data-table="services" >Delete</a>
                    </td>
                </tr>
                <?php $x++; } ?>
               
            </tbody>
        </table>
    </div>


<?php require_once BLA.'inc/footer.php';  ?>




   

