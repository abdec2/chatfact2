<?php

class User_model extends MY_Model{

	public $register_rules = array(
		    'firstname' => array (
					'field' => 'firstname',
					'label' => 'first name',
					'rules' => 'trim|required|xss_clean'
			),
			'lastname' => array (
					'field' => 'lastname',
					'label' => 'last name',
					'rules' => 'trim|required|xss_clean'
			),
			'email' => array (
					'field' => 'email',
					'label' => 'email',
					'rules' => 'trim|required|valid_email|callback_unique_email|xss_clean'
			),
			'username' => array (
					'field' => 'username',
					'label' => 'username',
					'rules' => 'trim|required|callback_unique_username|xss_clean'
			),
			'password' => array (
					'field' => 'password',
					'label' => 'password',
					'rules' => 'trim|required|matches[cpassword]|xss_clean'
			),
			'cpassword' => array (
					'field' => 'cpassword',
					'label' => 'confirm password',
					'rules' => 'trim|required|matches[password]|xss_clean'
			)
		);

		public $login_rules = array(
			'username' => array (
					'field' => 'username',
					'label' => 'username',
					'rules' => 'trim|required'
			),
			'password' => array (
					'field' => 'password',
					'label' => 'password',
					'rules' => 'trim|required'
			)
		);	

		public $profile_rules = array(
			'firstname' => array (
					'field' => 'firstname',
					'label' => 'firstname',
					'rules' => 'trim|required|xss_clean'
			),
			'lastname' => array (
					'field' => 'lastname',
					'label' => 'lastname',
					'rules' => 'trim|required|xss_clean'
			),
			'email' => array (
					'field' => 'email',
					'label' => 'email',
					'rules' => 'trim|required|valid_email|callback_email_check|xss_clean'
			)
		);	
		public $password_rules = array(
			'current_password' => array (
					'field' => 'current_password',
					'label' => 'current password',
					'rules' => 'trim|required|callback_password_check|xss_clean'
			),
			'new_password' => array (
					'field' => 'new_password',
					'label' => 'new password',
					'rules' => 'trim|required|xss_clean'
			),
			'confirm_newpassword' => array (
					'field' => 'confirm_newpassword',
					'label' => 'confirm password',
					'rules' => 'trim|required|matches[new_password]|xss_clean'
			)
		);	

		public function get_friend_list($userid){

			/*$subquery = $this->db->select('from')
								->distinct()
								->where('to',)*/


			$friends = $this->db->select('users.id, firstname, lastname, avatar, online')
								->from('users')
								->join('contact_list', 'users.id = contact_list.friend_id')
								->where('contact_list.user_id', $userid)
								->get();

			/*print_r($friends->result());
			exit();*/

			return ($friends->num_rows() !=0 ) ? $friends->result() : FALSE;
    }

    	public function delete_friend($logged_user, $buddyid) {
    		$this->db->delete('contact_list', array('user_id' => $logged_user, 'friend_id'=>$buddyid));

    		return ($this->db->affected_rows()) ? TRUE : FALSE;
    	}

    	
}