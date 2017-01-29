            </div> <!-- /container -->       
  
        <footer>
        <div class="container">

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="footer-menu">
                  <ul>
                    <li><a href="<?php echo base_url().'home/search'; ?>">Search</a></li>
                    <li><a href="<?php echo base_url().'home/about'; ?>">About</a></li>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url().'home/help'; ?>">Help</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3"></div>
            </div>

          
        </div>
        </footer> 
      



        <script src="<?= base_url('assets/js/vendor/bootstrap.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script>
  
  $('#chat-box').draggable();

</script>
<script>
  $('a[data-id = "btn-login-popup"]').click(function(){
    $('#login-popup').modal('show');
  });
</script>

      
    </body>
</html>