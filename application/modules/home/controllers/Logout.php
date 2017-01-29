<?php 


class Logout extends MY_Controller {


	public function index() {


		$this->load->model('profilemodel');
		$this->profilemodel->update_status($this->session->userdata('user_id'), '0');
		
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');

		


		return redirect('home','refresh');







	}
}