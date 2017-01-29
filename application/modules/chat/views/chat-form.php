<!--
| CHAT HEADER SECTION
-->
<h2 class="chat-header">
    <i class="fa fa-comment"></i> 
    <span class="btn btn-xs btn-<?php echo $cur_user->online== 1 ? 'success' : 'danger'; ?>" id="current_status"><?php echo $cur_user->online== 1 ? 'Online' : 'Offline'; ?></span>

</h2>
<!--
| CHAT CONTACTS LIST SECTION
-->
<div class="chat-inner" id="chat-inner" style="position:relative;">
<div class="chat-group">
 <strong>Quick Chat History</strong>
 <?php if (isset($users)) : ?>
     <?php foreach ($users as $user) { if($user->id != $cur_user->id ){  ?> 
        <a href="javascript: void(0)" data-toggle="popover" >
        <div class="contact-wrap">
          <input type="hidden" value="<?php echo $user->id; ?>" name="user_id" />
           <div class="contact-profile-img">
               <div class="profile-img">
                <?php  $avatar = $user->avatar != '' ? $user->avatar : 'no-image.jpg' ; ?>
                <img src="<?php echo base_url('assets/images/thumbs').'/'.$avatar; ?>" class="img-responsive">
               </div>
           </div>
            <span class="contact-name">
                <small class="user-name"><?php echo ucwords($user->firstname.' '.$user->lastname); ?></small>
                <span class="badge progress-bar-danger" rel="<?php echo $user->id; ?>"><?php echo $user->unread; ?></span>
            </span>
            <span style="display: table-cell;vertical-align: middle;" class="user_status">
                <?php $status = $user->online == 1 ? 'is-online' : 'is-offline'; ?> 
                <span class="user-status <?php echo $status; ?>"></span>
            </span>
        </div>
        </a>
        <div class="delete-btn ">
                <span href="#" id="btnDel" class="btn btn-danger btn-xs" data-buddy=<?= $user->id ?> >Delete Chat</span>
        </div>
     <?php  }} ?>
 <?php else : ?>
    <p class="container-fluid"><?= $msg ?></p>
<?php endif; ?>
</div>
</div>
<!--
| CHAT CONTACT HOVER SECTION
-->
<div class="popover" id="popover-content">
    <div id="contact-image"></div>
    <div class="contact-user-info">
        <div id="contact-user-name"></div>
        <div id="contact-user-status" class="online-status"></div>
    </div>
</div>
<!--
| INDIVIDUAL CHAT SECTION
-->

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
        <div class= "chat-textarea">
            <input placeholder="Type your message" class="form-control" />
        </div>
    </div>
</div>

<script>
  
  $('#chat-box').draggable();

</script>



