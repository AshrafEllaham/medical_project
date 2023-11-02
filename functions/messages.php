<?php if(isset($error_messages) && !empty($error_messages)): ?>
        <div class="col-sm-6 offset-sm-3 border p-3">
            <div class="alert alert-danger text-center"> 
                <?php foreach($error_messages as $message): ?>
                    <h3><?php echo $message ?></h3>
                <?php endforeach ?>
            </div>
        </div>
<?php endif; ?>

<?php if(isset($success_messages) && !empty($success_messages)): ?>
        <div class="col-sm-6 offset-sm-3 border p-3">
            <div class="alert alert-success text-center"> 
                <?php 
                    if(is_array($success_messages)){
                    foreach($success_messages as $message){ ?>
                        <h3><?php echo $message ?></h3>
                    <?php }
                }else{ ?>
                    <h3><?php echo $success_messages ?></h3>
                <?php } ?>
            </div>
        </div>
<?php endif; ?>

