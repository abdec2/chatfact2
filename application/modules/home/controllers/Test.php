<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Test extends MY_Controller {

	public function index() {
			

		$this->load->model('profilemodel');

		$profile = $this->profilemodel->get_profile_by(2);

		print_r($profile);


		}

		

	}	