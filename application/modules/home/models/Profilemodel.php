<?php 

class Profilemodel extends MY_Model {

	public function insert_profile_data($post){

		$data = array(

			'pname'		=>	$post['inputprofilename'],
			'pimg'		=>	$post['image_path'],
			'pintro'	=>	$post['profiletextArea'],
			'pcountry'	=>	$post['inputcountry'],
			'pcategory'	=>	$post['inputcategory'],
			'uid'		=>	$post['uid'],
			'keyword'	=>	$post['inputkeywords']

			);

		$this->db->insert('profile',$data);

			
			return "Profile Created Successfully";

	} 

	public function check_profiledata ($user_id) 
	{
		$q = $this->db->get_where('profile',array('uid' => $user_id),1);

		return ($q->row()) ? $q->row() : false;

	}

	public function update_profile_data($post){

		
		$data = [

					'pname'			=>	$post['inputprofilename'],
					'pimg'			=>	$post['image_path'],
					'pintro'		=>	$post['profiletextArea'],
					'pcountry'		=>	$post['inputcountry'],
					'pcategory'		=>	$post['inputcategory'],
					'keyword'		=>	$post['inputkeywords']


		];

		$q=$this->db->where('uid', $post['uid'])
					->update('profile',$data);

		return ($this->db->affected_rows()) ? "Profile Updated Successfully" : "Profile can not be updated at the moment";
	}

	public function update_status($id, $status)
	{
		$data = array('online' => $status);

		$q = $this->db->where('id', $id)
						->update('users',$data);

	}

	public function deleteprofile($uid) 
	{
		$this->db->delete('profile', array('uid' => $uid)); 

		return ($this->db->affected_rows()) ? "Profile Deleted Successfully" : "Profile can not be Deleted at the moment";
	}

	public function get_profile_by($id) {
		$q = $this->db->where('id', $id)
						->limit(1)
						->get('profile');

		return $q->row();
	}
}