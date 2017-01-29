<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Loginmodel extends MY_Model{

	public function validate_login($username, $password){

		$q = $this->db->where(['uname'=>$username,'pword'=>$password, 'status'=>1])
						->get('users');


		if ($q->num_rows()) {	


			return $q->row();

		}/*else {


			return FALSE;
		}*/


	}

	public function email_checkdb ($email) 
	{
		$q = $this->db->select('uname')
						->from('users')
						->where('uname', $email)
						->limit(1)
						->get();


		$row = $q->row();

		return ($q->num_rows() === 1 && $row->uname) ? $row->uname : FALSE;


	}

	public function verify_reset_password_code($email, $temppassword) 
	{


		$q = $this->db->select('uname, temppass')
						->where(['uname'=>$email, 'temppass'=>$temppassword])
						->limit(1)
						->get('users');
		
		$row = $q->row();

		if ($q->num_rows() == 1) {
			return TRUE;
		}else{
			return false;
		}

	}

	public function insert_temppass($temppass, $email)
	{
		$result=$this->db->set('temppass', $temppass)
						->where('uname', $email)
						->update('users');


		if($result)
		{
			return $temppass; 

		} else{
			return false;
		}


	}

	public function verify_update_form($username, $code)
	{
		$q = $this->db->where(['uname'=>$username,'temppass'=>$code])
						->get('users');


		if ($q->num_rows()) {	


			return $q->row();
		}else {
			return false;
		}

	}

	public function update_new_password($email, $newpassword)
	{
		$result=$this->db->set('temppass', NULL)
						-> set('pword', $newpassword)
						->where('uname', $email)
						->update('users');


		return ($this->db->affected_rows() == 1) ? TRUE : FALSE;

	}

	public function activate_account($email) {

		$data = [

					'status'			=>	1


		];

		$q=$this->db->where('uname', $email)
					->update('users',$data);

		return ($this->db->affected_rows()) ? "You Have Activated Your Account! You May Now Create A Profile!" : "Profile can not be activated at the moment please try again...";
	}

	public function get_id($username,$password)
	{
		$q = $this->db->select('id')
						->from('users')
						->where('uname', $username)
						->where('pword', $password)
						->limit(1)
						->get();

		return ($q->row()) ? $q->row()->id : FALSE;
	}

}