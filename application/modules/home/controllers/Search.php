<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index() {
		$this->load->view('header');
		$this->load->view('search_view');
		$this->load->view('footer');

	}

	public function searchresults($query_id) {


			$this->load->model('searchmodel');
			$this->load->library('pagination');
		

				$this->searchmodel->load_query($query_id);


				$post = [

						'txtfieldsearch'		=>	$this->input->get('txtfieldsearch'),
						'countrysch'			=>	$this->input->get('countrysch'),
						'categorysch'			=>	$this->input->get('categorysch'),

				];


					$config['base_url'] = site_url('home/search/searchresults/'.$query_id);
					$config['per_page'] = 6;
					$config['total_rows'] = $this->searchmodel->num_rows($post);
					$config['full_tag_open'] = '<ul class="pagination">';
			        $config['full_tag_close'] = '</ul>';
			        $config['first_link'] = false;
			        $config['last_link'] = false;
			        $config['first_tag_open'] = '<li>';
			        $config['first_tag_close'] = '</li>';
			        $config['prev_link'] = 'Prev';
			        $config['prev_tag_open'] = '<li class="prev">';
			        $config['prev_tag_close'] = '</li>';
			        $config['next_link'] = 'Next';
			        $config['next_tag_open'] = '<li>';
			        $config['next_tag_close'] = '</li>';
			        $config['last_tag_open'] = '<li>';
			        $config['last_tag_close'] = '</li>';
			        $config['cur_tag_open'] = '<li class="active"><a href="#">';
			        $config['cur_tag_close'] = '</a></li>';
			        $config['num_tag_open'] = '<li>';
			        $config['num_tag_close'] = '</li>';
			         $config["uri_segment"] = 5;
			      

			        $this->pagination->initialize($config);
			        


			        	$data_page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

			  
				
				$srchresult =  $this->searchmodel->fetchrecords($post, $config['per_page'], $data_page);

				if ($srchresult) {
					

					
					
					$this->load->view('header');
					$this->load->view('side_bar');
					$this->load->view('search_view', ['profiles'=>$srchresult, 'total_records' => $config['total_rows']]);
					$this->load->view('footer');	

				}else {
					$this->load->view('header');
					$this->load->view('side_bar');
					$this->load->view('search_view', ['msg'=>'Sorry No Results Found']);
					$this->load->view('footer');
				}



	}


	public function searchitem(){

				$this->load->model('searchmodel');

				$query_array = [

						'txtfieldsearch'		=>	$this->input->post('txtfieldsearch'),
						'countrysch'			=>	$this->input->post('countrysch'),
						'categorysch'			=>	$this->input->post('categorysch'),

				];

				$query_id = $this->searchmodel->save_query($query_array);
				


				redirect(base_url('home/search/searchresults/'.$query_id));


	}


	public function ajax_profile($id) 
	{	
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
			$this->load->model('searchmodel');	

		$pdata = $this->searchmodel->ajax_profile_view($id);
		echo json_encode($pdata);
		} else {
			show_404();
		}

		




	}

	public function email_profile() {

		$profileid = $this->input->post('profileid');
		$email = $this->input->post('email');


		$this->load->model('profilemodel','profile');

		$data['profile'] = $this->profile->get_profile_by($profileid);
		$data['emailmsg'] = $this->input->post('emsg');
		
		$message = $this->load->view('email/email.php', $data, TRUE);



		$this->load->library('email');
		
		$this->email->from(CONTACT_EMAIL);
		$this->email->to($email);

		$this->email->set_mailtype('html');
		$this->email->subject('Chat Fact - Profile from Chat FACT !');
		$this->email->message($message);
		
		$this->email->send();
		





	}


}