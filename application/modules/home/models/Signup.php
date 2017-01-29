<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Signup extends MY_Model {


	public function registeruser($username, $password, $occupation, $status, $firstname, $lastname) {



			$data = array (

					'uname'=>$username,
					'pword'=>$password,
					'profession'=>$occupation,
					'status' => $status,
					'firstname' => $firstname,
					'lastname' => $lastname
				);

			$this->db->insert('users',$data);

			
			return "An email has been sent to your email address.. Please check to activate your account";

	}





}