<div class="modal fade" id="profile" role=dialog>
  <div class="modal-dialog profile-modal">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title modaltitle">Modal title</h3>
      </div>
      <div class="modal-body">
           <table class="table table-striped table-hover ">
            
              <tbody>
                <tr>
                  <td>
                  <img src="<?php echo base_url('assets/imgs/no-image.jpg'); ?>" name="profileimg" alt="No Image Found" class="profile-modal-img img-resposive">
                  </td>
                  <td><p class="justifiedtext" name="profile-intro" ></p></td>
                </tr>
                <tr>
                  <td><label name="lblCountry">Country</label></td>
                  <td><p name="txtcountry"></p></td>
                </tr>
                 <tr>
                   <td><label name="lblCategory">Category</label></td>
                   <td><p name="txtcategory"></p></td>
                 </tr>
              </tbody>
            </table> 
          
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>	
  </div>
</div>


<div class="modal fade" id="sendprofile" role=dialog>
  <div class="modal-dialog profile-modal">
    <div class="modal-content email-model-width">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <!-- <h3 class="modal-title modaltitle">Enter Email Address to Share this Card</h3> -->
        <p>Enter Email Address to Share this Card</p>
      </div>
      <div class="modal-body">
            <form id="emailform">
           <table></table>
              
              <tbody>
                
                <tr>
                  <td><input type="email" name="sendEmail" placeholder="Email Address" required></td>
                </tr>
                  <tr>
                  <td><textarea name="msgarea" rows="6" placeholder="Message"></textarea> </td>
                  <span id='confmsg' ></span>
                </tr>
                 
              </tbody>
            </table> 
          
             
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>  
  </div>
</div>