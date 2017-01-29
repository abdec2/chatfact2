<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends MY_Controller {

	public function index() {

		if ($this->session->userdata('user_id'))
		{
			return redirect(base_url('home/search'));
		}
		$this->load->view('home_view');

	}

	public function user_signup() {

		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('regusername', 'Username', 'trim|required|valid_emails|is_unique[users.uname]');
		$this->form_validation->set_rules('regpassword', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Re-enter Password', 'required');
		$this->form_validation->set_rules('occupation', 'Occupation', 'required');

		$this->form_validation->set_message('is_unique', 'This Username is already taken...');




		if ($this->form_validation->run()) {		
			
			$regusername = $this->input->post('regusername');
			$regpassword = md5($this->input->post('regpassword'));
			$occupation = $this->input->post('occupation');
			$firstname = $this->input->post('firstname');	
			$lastname = $this->input->post('lastname');

			$status = 0;
			$this->load->model('signup');

			$data['confmsg'] = $this->signup->registeruser($regusername, $regpassword, $occupation, $status, $firstname, $lastname);

			$this->load->helper('string');
			$temp_link = md5(random_string('alnum',16));


			$this->send_activation_email($regusername, $temp_link);

			$this->load->view('home_view', $data);

			
		} else {
			
			$this->index();	

		}

	}

	private function clean($string) {
			   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

			   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
			}

	private function send_activation_email($email, $temp_link) {

		$this->load->library('email');
		$hide_email= $this->clean(base64_encode($email));
		
		$this->email->set_mailtype('html');
		$this->email->from(CONTACT_EMAIL);
		$this->email->to($email);
		
		$this->email->subject('Chat Fact - Welcome!');
		$this->email->message('<html><body><p>Greetings !<br/>Please click on the below link to activate your account.<br/>
		<a href="'.base_url().'home/activate_user_profile/'.$hide_email.'/'.$temp_link.'">'.base_url("home/activate_user_profile/")."/".$hide_email."/".$temp_link.'</a></p><p>Thank You!</p><p>You may now create a profile to be included in our directory. You may also search for other profiles around the world, and have a quick chat with them... for free!</p><p>Chat Fact</p><p>www.chatfact.com</p><p>If you have not signed up with <a href="http://www.chatfact.com">www.chatfact.com</a>, please ignore this message and do not click the link mentioned above.</p></body></html>');
		
		$this->email->send();

	}

	public function activate_user_profile($hide_email, $temp_link){

		if(isset($hide_email, $temp_link))
		{
			$this->load->model('loginmodel');
			$email = base64_decode($hide_email);
			$email = trim($email);
			$verified = $this->loginmodel->email_checkdb($email);

			if ($verified) 
			{
				$data['confmsg']= $this->loginmodel->activate_account($email);
				$this->load->view('home_view', $data);

			} else
			{
				$this->load->view('home_view', ['error'=>'There was a problem with your link. please try again...','email'=>$email]);
			}
		}else {
			return redirect('home');
		}

	}


	public function userlogin() {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtfieldlid', 'Username', 'required|valid_emails');
		$this->form_validation->set_rules('lipwd', 'Password', 'required');

		if ($this->form_validation->run()) {

				$txtfieldlid = $this->input->post('txtfieldlid');
				$lipwd = md5($this->input->post('lipwd'));
				
				$this->load->model('loginmodel');
				$userobj = $this->loginmodel->validate_login($txtfieldlid, $lipwd);	
						if ($userobj) {	
							$this->session->set_userdata('user_id',$userobj->id);
							$this->session->set_userdata('username',$userobj->uname);
							$this->session->set_userdata('logged_in', $_SERVER['REQUEST_TIME']);

							$this->load->model('profilemodel');
							$this->profilemodel->update_status($userobj->id, '1');
							
							return redirect(base_url('home/profile'));

						} else {

								$this->session->set_flashdata('login_failed', 'Invalid Username and Password');
								return redirect(base_url('home'));

						}

				} else {
					
					$this->index();

				}

		}


	public function reset_password() 
	{	
		$this->load->library('form_validation');
		if($this->input->post('f_username') && !empty($this->input->post('f_username'))) 
		{
			$this->form_validation->set_rules('f_username', 'Username', 'trim|required|valid_email');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('header');
				$this->load->view('forgetpwd_view');
				$this->load->view('footer');
			} else 
			{
				$this->load->model('loginmodel');
				$email = trim($this->input->post('f_username'));
				$result = $this->loginmodel->email_checkdb($email);

			
				if ($result) 
				{
					$this->load->helper('string');
					$temppass = md5($result.random_string('alnum',16));

					$temppassword = $this->loginmodel->insert_temppass($temppass, $result);

					if($temppassword)
					{
						$this->send_password_email($result, $temppassword);
						$this->load->view('header');	
						$this->load->view('forgetpwd_view',['success' => 'Please Check Your Email For Further Instruction']);
						$this->load->view('footer');
					}else {
						return false;
					}

					

				}
				else
				{	
					$this->load->view('header');	
					$this->load->view('forgetpwd_view',['error'=>'The Email Address you provide is not registered with ChatFact']);
					$this->load->view('footer');

				}
			}
		}
		else 
		{
			$this->load->view('header');
			$this->load->view('forgetpwd_view');
			$this->load->view('footer');
		}


	}

	public function send_password_email ($email, $temppassword)
	{

		$this->load->library('email');
		$hide_email= $this->clean(base64_encode($email));
		
		$this->email->set_mailtype('html');
		$this->email->from(CONTACT_EMAIL);
		$this->email->to($email);
		
		$this->email->subject('Chat Fact - Forgot Password');
		$this->email->message('<html><body><p>Greetings! Please click on the below link to re-new your password</p>
			<p><a href="'.base_url().'home/reset_password_form/'.$hide_email.'/'.$temppassword.'">'.base_url("home/reset_password_form/")."/".$hide_email."/".$temppassword.'</a></p><p>Thank you,</p><p>Chat Fact</p><p>www.chatfact.com</p></body></html>');
		
		$this->email->send();
		
	}


	public function reset_password_form($hide_email, $temppassword)
	{
		if(isset($hide_email, $temppassword))
		{
			$this->load->model('loginmodel');
			$email = base64_decode($hide_email);
			$email = trim($email);
			$verified = $this->loginmodel->verify_reset_password_code($email, $temppassword);

			if ($verified) 
			{
				$this->load->view('view_update_password', ['email'=>$email, 'tempcode'=>$temppassword]);

			} else
			{
				$this->load->view('header');
				$this->load->view('forgetpwd_view', ['error'=>'There was a problem with your link. Please click it again, or request to reset your password again','email'=>$email]);
				$this->load->view('footer');
			}
		}else {
			return redirect('home');
		}
	}

	public function update_password() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Re-enter Password', 'required');
		$this->form_validation->set_rules('username', 'User Name', 'required|trim|valid_email');
		$this->form_validation->set_rules('code', 'Code', 'required');

		if ($this->form_validation->run()) {		

			$this->load->model('loginmodel');
			$email=$this->input->post('username');
			$code=$this->input->post('code');
			$verify_form = $this->loginmodel->verify_update_form($email, $code);

			if($verify_form)
			{
				$newpassword = md5($this->input->post('newpassword'));
				$password_updated = $this->loginmodel->update_new_password($email, $newpassword);

				if ($password_updated) {


					$this->session->set_flashdata('pass_changed', 'Your Password Has Been Changed!');
					return redirect('home');

				}else {
					$this->load->view('header');
					$this->load->view('forgetpwd_view', ['error'=>'There was a problem with your link. Please click it again, or request to reset your password again']);
					$this->load->view('footer');
				}


			} else {

				$this->load->view('header');
					$this->load->view('forgetpwd_view', ['error'=>'The Provided Data is not Valid']);
					$this->load->view('footer');

			}




		} else {

			$this->load->view('header');
			$this->load->view('forgetpwd_view', ['error'=>'The Provided Data is not Valid, Try Again']);
			$this->load->view('footer');

		}
	}

	public function about() 
	{
		$this->load->view('header.php');
		$this->load->view('about.php');
		$this->load->view('footer.php');
		
	}

}

