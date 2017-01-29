<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->authentication->is_loggedin()){
			redirect(site_url('chat/auth'));
		}
		$this->load->model('user_model', 'user');
		$this->load->model('message_model', 'message');
	}

	public function index()
	{
		$id = $this->authentication->read('identifier');
		$data['cur_user'] = $this->user->get($id);
		// $contacts 	  = $this->user->get_all();
		$contacts		=	$this->user->get_friend_list($id);
	/*	print_r($contacts);
		exit();
		*/
		if ($contacts){
			foreach ($contacts as $key=>$contact) {
				//get unread messages from this user
				$unread = $this->message->unread_per_user($id, $contact->id); 
				$contacts[$key]->unread =  $unread > 0 ? $unread : null ; 
			}
			$data['users'] = $contacts;
			$this->load->view('chat-form', $data);
		}else {
			$data['msg']="You Have No Quick Chats";
			$this->load->view('chat-form', $data);
		}
			
	}

	
	public function email_check(){
		$id 	= $this->authentication->read('identifier');
		$user 	= $this->user->get_by('email', $this->input->post('email'));

		if(!empty($user) && $user->id != $id) {
			$this->form_validation->set_message('email_check', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}

	public function password_check(){
		$id 	= $this->authentication->read('identifier');
		$user 	= $this->user->get($id);
		if($user->password != sha1($this->input->post('current_password'))) {
			$this->form_validation->set_message('password_check', 'Wrong %s ');
			return FALSE;
		}
		return TRUE;
	}

/*-----------------------------------------------------------------------------------------------------------------------
	function to upload user photos
-------------------------------------------------------------------------------------------------------------------------*/
	public function upload_photo($fieldname) {
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = 'assets/images/thumbs/';
		// set the filter image types
		$config['allowed_types'] = 'png|gif|jpeg|jpg';
		$config['max_width'] = '500'; 
		$this->load->helper('string');
		$config['file_name']	 = random_string('alnum', 32);
		//load the upload library
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	
		//if not successful, set the error message
		if (!$this->upload->do_upload($fieldname)) {
			$data = array('success' => false, 'msg' => $this->upload->display_errors());
		}
		else
		{ 
			$upload_details = $this->upload->data(); //uploading

			$config1 = array(
			      'source_image' => $upload_details['full_path'], //get original image
			      'new_image' => 'assets/images/thumbs/', //save as new image //need to create thumbs first
			      'maintain_ratio' => true,
			      'width' => 128,
			      'height' => 128
			    );
		    $this->load->library('image_lib', $config1); //load library
		    $this->image_lib->resize(); //generating thumb
			$data = array('success' => true, 'upload_data' => $upload_details, 'msg' => "Upload success!");
		}
		return $data;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */