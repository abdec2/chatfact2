<?php 

class Help extends MY_Controller 
{

	public function index() 
	{
		$this->load->view('header');
		$this->load->view('help-v');
		$this->load->view('footer');

	}

	public function key_details() {
		$this->load->view('header');
		$this->load->view('key-details');
		$this->load->view('footer');
	}

	public function deleteprofile()
	{
		$this->load->view('header');
		$this->load->view('delete-p');
		$this->load->view('footer');
	}

	public function deletecard() 
	{
		if($this->input->post('username') && $this->input->post('password'))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_emails');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run()) {

				$username = $this->input->post('username');
				$password =  md5($this->input->post('password'));

				$this->load->model('loginmodel');

				$id=$this->loginmodel->get_id($username, $password);

				if($id)
				{
					$this->load->model('profilemodel');
					$data['msg'] = $this->profilemodel->deleteprofile($id);

					$this->load->view('header');
					$this->load->view('delete-card-form', $data);
					$this->load->view('footer');
				}
				else {

					$data['error']="Username and Password do not match..";
					$this->load->view('header');
					$this->load->view('delete-card-form',$data);
					$this->load->view('footer');

				}


			} else {
				$this->load->view('header');
				$this->load->view('delete-card-form');
				$this->load->view('footer');
			}

		}else {
				$this->load->view('header');
				$this->load->view('delete-card-form');
				$this->load->view('footer');
		}
	}
}