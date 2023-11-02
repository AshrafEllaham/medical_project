<?php  

require 'config.php';
require BL.'functions/validate.php';  

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css" >

    <title>Home Page</title>
  </head>
  <body>
   


    <div class="cont-main" style="background:url(<?php echo ASSETS .'images/bg-1.jpg';?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                <?php 
                    if (isset($_POST['submit'])) 
                    {
                        $service = $_POST['service'];
                        $city = $_POST['city'];
                        $mobile = $_POST['mobile'];
                        $notes = $_POST['notes'];
                        $name =  $_POST['name'];
                        $email = $_POST['email'];
                        
                        if (!check_empty($mobile) && !check_empty($name)) 
                        {
                            $conn = new db;
                            $success_messages = $conn->db_insert('orders', [
                                'name' => $name,
                                'email' => $email,
                                'mobile' => $mobile,
                                'service_id' => $service,
                                'city_id' => $city,
                                'notes' => $notes
                            ]);
                        }
                        else 
                        {
                            $error_messages[] = "Please Type Your Name And Your Mobile";
                        }
                    }
                ?>

                <form class="row" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-5" >
                    <?php require BL.'functions/messages.php'; ?>
                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="serv" class="font-1">Choose Service</label>
                            <select name="service" id="serv" class="form-control font-1">
                                <?php
                                    $conn = new db;
                                    $data = $conn->get_rows('services');  
                                    $x=1; 
                                    foreach($data as $row){   
                                ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                                <?php } ?> 
                            </select>
                            
                        </div>
                    </div>


                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="serv" class="font-1">Choose City</label>
                            <select name="city" id="serv" class="form-control font-1">
                                <?php 
                                    $conn = new db;
                                    $dataCity = $conn->get_rows('cities');  
                                    $x=1; 
                                    foreach($dataCity as $row){   
                                ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                                <?php } ?> 
                            </select>
                            
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">

                            <label for="serv" class="font-1">Type Your Name *</label>
                            <input type="text" name="name"  class="form-control font-1 bg-base">
                            
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group ">

                            <label for="serv" class="font-1">Type Your Email</label>
                            <input type="email" name="email"  class="form-control font-1 bg-base">
                            
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group ">

                            <label for="serv" class="font-1">Type Your Mobile *</label>
                            <input type="text" name="mobile"  class="form-control font-1 bg-base">
                            
                        </div>
                    </div>
                    



                    <div class="col-sm-12">
                        <div class="form-group">

                            <label for="serv" class="font-1">Type Notes</label>
                            <textarea name="notes"  class="form-control font-1 bg-base"  rows="5"></textarea>
                            
                        </div>
                    </div>



                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success form-control">Send</button>
                        </div>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ASSETS; ?>js/jquery-3.4.1.min.js" ></script>
    <script src="<?php echo ASSETS; ?>js/popper.min.js" ></script>
    <script src="<?php echo ASSETS; ?>js/bootstrap.min.js" ></script>
  </body>
</html>