<?php if(isset($msg)) : ?>
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo $msg; ?></strong>
        </div>
      <?php endif; ?>

 <?php if(isset($error)) : ?>
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo $error; ?></strong>
        </div>
      <?php endif; ?>

<div class="container full"  >
	<div class="row ">
		<div class="col-md-8 col-md-offset-2">
			<h3 style="color: grey; font-family: arial; font-weight: bold; width: 200px; margin: auto; padding-bottom: 30px; padding-top: 50px;">Help Center</h3>
						
		</div>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-5">
		<h4 style="font-weight: bold;">Deleting Your Profile</h4>
			<?php echo form_open('home/help/deletecard', ['id'=>'deleteform']); ?>
			<div class="form-group" style="margin-top: 30px;">
					<p>&nbsp;&nbsp;&nbsp;&nbsp; Enter You Username and Password</p>
                 <?php 
                      $username =array('name' => 'username' ,
                                          'placeholder' => 'Username (Email)',
                                          'type' => 	'email',
                                          'value'=>set_value('username'),
                                          'class'=>'signup-text',
                                          'style'=>'margin-left: 50px;',
                       );
                      
                      echo form_input($username);
                   ?>
                   <?= form_error('username', '<p style="text-align: center;" class="text-danger">','</p>');?>
			</div>
			<div class="form-group" style="margin-top: 30px;">
                 <?php 
                      $password =array('name' => 'password' ,
                                          'placeholder' => 'Password',
                                          'type' => 	'password',
                                          'value'=>set_value('password'),
                                          'class'=>'signup-text',
                                          'style'=>'margin-left: 50px; margin-top: 5px;',
                       );
                      
                      echo form_input($password);
                   ?>
                   <?= form_error('password', '<p style="text-align: center;" class="text-danger">','</p>');?>
			</div>

			
		</div>
		<div class="col-md-2"></div>

	</div>
	<div class="row">
		<div class="col-md-9 col-md-offset-3">
			<div class="form-group" style="margin-top: 10px;">
				<input type="button" id="delete-card" class='btn-cf' value="Delete">
			</div>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-9 col-md-offset-2">
			<div id="confirmation" class="form-group hidden" style="margin-top: 30px;">
					<p> Are You Sure You Want To Delete Your Profile From The Directory?</p>   
					<div class="form-group" style="margin-top: 10px;">
						<input type="button" class='btn-cf' id="dcardNo" value="No">
					</div>    
					<div class="form-group" style="margin-top: 10px;">
						<?php echo form_submit(['name'=>'submit','class'=>'btn-cf', 'value'=>'Yes'] ); ?>
					</div>          
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	

</div>

<script>
	$(document).on('click','#delete-card',function(){
		$('#confirmation').removeClass('hidden');
	});

	$(document).on('click','#dcardNo',function(){
		$('#confirmation').addClass('hidden');
	});

	$('#deleteform').on('keyup keypress', function(e) {
		  var keyCode = e.keyCode || e.which;
		  if (keyCode === 13) { 
		    e.preventDefault();
		    return false;
		  }
		});
</script>