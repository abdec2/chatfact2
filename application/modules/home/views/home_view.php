<?php include_once ('header.php') ?>
   
      
      <?php if($error = $this->session->flashdata('login_failed')) : ?>
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo $error; ?></strong>
        </div>
      <?php endif; ?>

      <?php if($success = $this->session->flashdata('pass_changed')) : ?>
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo $success; ?></strong>
        </div>
      <?php endif; ?>

               
      <?php if(isset($confmsg)): ?>
        <div class="alert alert-success">
          <strong>Success!</strong> <?php echo $confmsg; ?>
        </div>
      <?php endif; ?>

   
    <div class="jumbotron">
      <div class="container">
        <p class="custom-para">Connect Your Product or Services With The World.</p>
        <p class="custom-para">Expand Your Business Network and Relationships.</p>  
        <p class="custom-para">Search and Chat With Profiles For Free.</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
      
        <div class="col-md-12">
          <p class="signup-heading">Sign Up To Display a Profile For Your <br>Product or Service.&nbsp&nbsp It's All Free.</p>
        </div>
      
      </div>

      <div class="row">
        <div class="col-md-4"></div> 
        <div class="col-md-4">
            <?php echo form_open('home/user_signup', ['class'=>'signupForm', 'role'=>'form']) ?>
            <!-- <form class="signupForm" role="form"> -->

                <div class="form-group">
                  <p>
                    <?php 
                      $regfirstname =array('name' => 'firstname' ,
                                          'placeholder' => 'First Name',
                                          'value'=>set_value('firstname'),
                                          'class' => 'signup-text',
                       );

                      echo form_input($regfirstname);;
                   ?>
                   <?= form_error('firstname', '<p class="text-danger">','</p>');?>
                  </p>
                </div>
                <div class="form-group">
                  <p>
                     <?php 
                      $reglastname =array('name' => 'lastname' ,
                                          'placeholder' => 'Last Name',
                                          'value'=>set_value('lastname'),
                                          'class' => 'signup-lastname',
                       );

                      echo form_input($reglastname);;
                   ?>
                   <?= form_error('lastname', '<p class="text-danger">','</p>');?>
                  </p>
                </div>
                <div class="form-group">
                  <p><?php 
                      $regusername =array('name' => 'regusername' ,
                                          'placeholder' => 'Username (Email)',
                                          'type' => 'email',
                                          'value'=>set_value('regusername'),
                       );

                      echo form_input($regusername);;
                   ?>
                   <?= form_error('regusername', '<p class="text-danger">','</p>');?>
                </div>
                <div class="form-group">
                  <p> <?php echo form_password(['name'=>'regpassword','placeholder'=>'Password']); ?></p>
                  <?= form_error('regpassword', '<p class="text-danger">','</p>');?>
                </div>
                <div class="form-group">
                  <p><?php echo form_password(['name'=>'passconf','placeholder'=>'Re-Enter Password']); ?></p>
                  <?= form_error('passconf', '<p class="text-danger">','</p>');?>
                </div>
                <div class="form-group">
                  <p>Select one:</p>
                </div> 
                <div class="input-group">
                  <span class="">
                    <?php echo form_radio(['name'=>'occupation', 'id'=>'RbOcc1', 'value'=>'I am a Freelancer, Business, Company, Organization, or Institution'], FALSE); ?>
                  </span>
                  <?php echo form_label('I am a Freelancer, Business, Company, Organization, or Institution', 'RbOcc1'); ?>
                </div><!-- /input-group -->
                <div class="input-group">
                  <span class="">
                      <?php echo form_radio(['name'=>'occupation', 'id'=>'RbOcc2', 'value'=>'I am an Employee'], FALSE); ?>
                   </span>
                  <?php echo form_label('I am an Employee', 'RbOcc2'); ?>
                </div>
                <?= form_error('occupation', '<p class="text-danger">','</p>');?>

                <div class="form-group btn-margin display-inline">
                    <?php echo form_submit('submit', 'Sign Up'); ?>
                    <!-- <a href="#">Sign Up</a> -->
                </div>
                  <div class="form-group signupinfo ">
                    <p>By Signing Up, You Agree To Our Terms and Conditions, Private Policy, and Cookie Use</p>
                </div> 

            <?php echo form_close();?>
  
       </div>
       <div class="col-md-4"></div>
      
      </div>

<?php include_once ('footer.php') ?>
