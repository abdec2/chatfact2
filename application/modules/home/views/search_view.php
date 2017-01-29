<?php include_once('side_bar.php'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">

<?php if($success = $this->session->flashdata('success')) : ?>
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo $success; ?></strong>
        </div>
      <?php endif; ?>

<div class="container full">
<div id="main-container">
<?php if ($this->session->userdata('user_id')): ?>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4  my_menu">
				<ul class="list-inline ">
					<li><?= anchor('home/profile', 'My Profile');?></li>
					<li><?= anchor('chat', 'My Quick Chats'); ?></li>
				</ul>
			</div>
		</div>
	<?php endif ?>
		<?php if (isset($profiles)): ?>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<p style="text-align: center; color: #999;" class="alert"><?php echo $total_records; ?> Results Found</p>				
			</div>
		</div>
		<div class="scardcontainer">
		<?php foreach ($profiles as $profile): ?>	

		<div class="scarddiv">
			<table class="table profile-card ">
			  <thead>
			    <tr>
			      <th><h3><?= $profile->pname?></h3></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><?php if(!$profile->pimg): ?><img src="<?php echo base_url('assets/imgs/no-image.jpg'); ?>" alt="No Image Found" class="profile-pic img-resposive"><?php else: ?><img src="<?php echo $profile->pimg; ?>" class="profile-pic img-resposive"><?php endif; ?></td>
			    </tr>
			    <tr>
			    	<td><p class="card-paragraph"><?= $profile->pintro ?></p></td>
			    </tr>
			  	<tr>
			  		<td align='center'>
			  			
							<a href="#" class="cardbtns" id="btnprofile" onclick="showprofile(<?= $profile->id ?>)">Profile</a>
							<?php if ($this->session->userdata('user_id')) : ?>
								<?php if($this->session->userdata('user_id') != $profile->uid): ?>
								<a href="javascript: void(0)" class="cardbtns" data-toggle="btnqchat" data-uid=<?= $profile->uid ?>>Quick Chat</a>

								<?php else : ?>
								<?= anchor('', 'Quick Chat', ['class'=>'cardbtns', 'style'=>'pointer-events :none;']); ?>
								<?php endif; ?>
							<?php else : ?>
							<a href="javascript: void(0)" class="cardbtns" data-id="btn-login-popup">Quick Chat</a>
							<?php endif; ?>
							<a href="#" class="cardbtns" id="btnshare" onclick="sendprofile(<?= $profile->id ?>)">Share</a>
			  		</td>
			  	</tr>
			  </tbody>
			</table> 
			
		</div>
	<?php endforeach; ?>
	<div class="row">
		<div><?= $this->pagination->create_links(); ?></div>
	</div>
	</div>
	
<?php elseif (isset($msg)) :?>
	<div class="row">
			<div class="alert alert-info">
				<p style="text-align: center; color: #999;"><?php echo $msg; ?></p>				
			</div>
		</div>
	<?php  else: ?>
		<div class="row">
				<div class="alert alert-info">
					<p style="text-align: center; color: #999;">Use Search Fields To Begin</p>				
				</div>
			</div>
			<?php endif ?>
		
	<?php if ($this->session->userdata('user_id')): ?>

<div id="spchat-container">
<div id="chat-box" >
    <div class="chat-box-header">
        <a href="javascript: void(0);" class="chat-box-close pull-right">
            <i class="fa fa-remove"></i>
        </a>
        <span class="user-status is-online"></span>
        <span class="display-name"></span>
        <small></small>
    </div>

    <div class="chat-container">
        <div class="chat-content">
            <input type="hidden" name="chat_buddy_id" id="chat_buddy_id"/>
            <ul class="chat-box-body"></ul>
        </div>
        <div class="chat-textarea">
            <input placeholder="Type your message" class="form-control" />
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chatigniter.js"></script>



<?php endif; ?>
</div>	



<?php include_once('profilemodel.php'); ?>


<div class="modal" id="login-popup">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p>Please Log In or Sign Up to Chat With Other Users</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




	