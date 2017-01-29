<?php 


class Searchmodel extends MY_Model {


	public function fetchrecords($post , $limit, $offset) {

		$this->db->select('*')->from('profile');

	
		if (strlen($post['txtfieldsearch'])) {
			$this->db->like('pname',$post['txtfieldsearch']);
			$this->db->or_like('keyword',$post['txtfieldsearch']);

		}
		if (is_array($post['countrysch'])) {
/*			$this->db->or_where_in('pcountry',$countrykeyword);*/
			foreach($post['countrysch'] as $key => $value) {
			    if($key == 0) {
			        $this->db->like('pcountry', $value);
			    } else {
			        $this->db->or_like('pcountry', $value);
			    }
			}
		}
		if (is_array($post['categorysch'])) {
			/*$this->db->or_where_in('pcategory',$categorykeyword);*/
			foreach($post['categorysch'] as $key => $value) {
			    if($key == 0) {
			        $this->db->like('pcategory', $value);
			    } else {
			        $this->db->or_like('pcategory', $value);
			    }
			}

		}

		
		$q=$this->db->limit($limit,$offset)
					->get();

		return $q->result();
		
	}

	public function num_rows($post) {

		$this->db->select('*')->from('profile');

		if (strlen($post['txtfieldsearch'])) {
			$this->db->like('pname',$post['txtfieldsearch']);
			$this->db->or_like('keyword',$post['txtfieldsearch']);

		}
		if (is_array($post['countrysch'])) {
/*			$this->db->or_where_in('pcountry',$countrykeyword);*/
			foreach($post['countrysch'] as $key => $value) {
			    if($key == 0) {
			        $this->db->like('pcountry', $value);
			    } else {
			        $this->db->or_like('pcountry', $value);
			    }
			}
		}
		if (is_array($post['categorysch'])) {
			/*$this->db->or_where_in('pcategory',$categorykeyword);*/
			foreach($post['categorysch'] as $key => $value) {
			    if($key == 0) {
			        $this->db->like('pcategory', $value);
			    } else {
			        $this->db->or_like('pcategory', $value);
			    }
			}

		}

		$q=$this->db->get();

			
		return $q->num_rows();

	}

	
	public function ajax_profile_view($id)
	{

		$q = $this->db->select('*')
					->from('profile')
					->where('id',$id)
					->get();


		return $q->row();
	}


	public function save_query($query_array){

		$this->db->insert('querystring', array('query_string' => http_build_query($query_array)));

		return $this->db->insert_id();
	}

	public function load_query ($query_id) {

		$q = $this->db->get_where('querystring', array('id' => $query_id ))->result();

		if (isset($q[0])) {		

			parse_str($q[0]->query_string, $_GET);
		}
	}


}