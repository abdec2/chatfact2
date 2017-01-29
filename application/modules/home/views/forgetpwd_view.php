<div class="container full">
	<div class="row margin-center">
		<div class="col-md-6 col-md-offset-3">
			<p style="font-size: 16px; text-align: center;">Recover Your Password By Entering Your Username(Email) Below</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php echo form_open('home/reset_password'); ?>
			 <div class="form-group">
                  <p style="text-align: center;"><?php 
                      $f_username =array('name' => 'f_username' ,
                                          'placeholder' => 'Username (Email)',
                                          'type' => 	'email',
                                          'value'=>set_value('f_username'),
                                          'class'=>'f-username-input'
                       );

                      echo form_input($f_username);;
                   ?>
                   <?= form_error('f_username', '<p style="text-align: center;" class="text-danger">','</p>');?>
			</div>

	       <div class="form-group btn-margin custom-button">
	          <p style="text-align: center;"><?php echo form_submit('submit', 'Submit'); ?></p>
	       </div>
			<?= form_close();?>

			<?php if(isset($success)) : ?>
				<p style="font-size: 16px; text-align: center;"> Submitted!<br><?= $success ?></p>

			<?php endif; ?>
			<?php if(isset($error)) : ?>
				<p style="font-size: 16px; text-align: center;"><?= $error ?></p>

			<?php endif; ?>

		</div>
	</div>
</div>



