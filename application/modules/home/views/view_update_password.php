<?php include_once ('header.php') ?>
   
     <div class="container">
      <!-- Example row of columns -->
      <div class="row">
      
        <div class=" margin-center col-md-12">
          <p style="text-align: center; font-family: Arial; font-size: 14px; padding-bottom: 20px;">Please Enter New Password and Click Confirm</p>
        </div>
      
      </div>

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php echo form_open('home/update_password', ['class'=>'signupForm', 'role'=>'form']) ?>
            <!-- <form class="signupForm" role="form"> -->

                
                <div class="form-group">
                  <p> <?php echo form_password(['name'=>'newpassword','placeholder'=>'New Password', 'required'=>'required']); ?></p>
                  <?= form_error('newpassword', '<p class="text-danger">','</p>');?>
                </div>
                <div class="form-group">
                  <p><?php echo form_password(['name'=>'passconf','placeholder'=>'Re-Enter New Password', 'required'=>'required']); ?></p>
                  <?= form_error('passconf', '<p class="text-danger">','</p>');?>
                </div>
                <div class="form-group">
                 <input type="hidden" name='username' value="<?= $email ?>">
                 <input type="hidden" name='code' value="<?= $tempcode ?>">
                </div>
                <div class="form-group btn-margin btn-confirm">
                    <?php echo form_submit(['class'=>'btn_confirm'], 'Confirm'); ?>
                </div>
                  

            <?php echo form_close();?>
  
       </div>
       <div class="col-md-4"></div>
      
      </div>

<?php include_once ('footer.php') ?>
