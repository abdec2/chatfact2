<?php 

class Profile extends MY_Controller {


	public function index() 
	{	
		if($user_id=$this->session->userdata('user_id'))
		{	
			$this->load->model('profilemodel');

			if ($profile=$this->profilemodel->check_profiledata($user_id)) {
				
				$profile->pcountry = explode(",", $profile->pcountry);
				$profile->pcategory = explode(",", $profile->pcategory);
				/*echo "<pre>";
				print_r($profile);
				exit();*/

				$this->load->view('header');
				$this->load->view('view_updateprofile',['profile' => $profile]);
				$this->load->view('footer');			
			}else {
				$this->load->view('header');
				$this->load->view('view_profile');
				$this->load->view('footer');
			}

		}else {
			return redirect(base_url('home'));
		}
	}

	public function create_user_profile()
	{
		$this->load->model('profilemodel','profile');
		$check_data = $this->profile->check_profiledata($this->session->userdata('user_id'));
		if(!$check_data)
			{
				$config = [

				'upload_path' => './uploads',
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'		=>	'2048'
				];

				$this->load->library('form_validation');
				$this->load->library('upload',$config);

				$this->form_validation->set_rules('inputprofilename', 'Profile Name', 'required');
				$this->form_validation->set_rules('profiletextArea', 'Description', 'required');
				$this->form_validation->set_rules('inputkeywords', 'Keywords', 'required');
				$this->form_validation->set_rules('inputcountry[]', 'Country', 'required');
				$this->form_validation->set_rules('inputcategory[]', 'Category', 'required');



				if ($this->form_validation->run()) {

					$post = $this->input->post();
					unset($post['createcard']);

					if ($post['optionsRadios']==1) {

							if ( ! $this->upload->do_upload()){
								$upload_error = $this->upload->display_errors();
								$this->session->set_flashdata('upload_error', $upload_error);
								return redirect('home/profile');
							}
							else{
								$file_data = $this->upload->data();
								$post['image_path'] = base_url('uploads')."/".$file_data['raw_name'].$file_data['file_ext'];
							}

					} else {

						$post['image_path'] = null;
					}
					
					$post['inputcountry']= implode(",", $post['inputcountry']);
					$post['inputcategory']= implode(",", $post['inputcategory']);
					$post['uid'] = $this->session->userdata('user_id');	

					$msg=$this->profile->insert_profile_data($post);

					$this->session->set_flashdata('success', $msg);

					return redirect('home/profile');





				} else {

						$this->load->view('header');
						$this->load->view('view_profile');
						$this->load->view('footer');


				}

			}
			else 
			{
				return redirect(base_url('home/profile/update_profile'));
			}





	}


	public function update_profile()
	{
		$this->load->model('profilemodel');
		$profile = $this->profilemodel->check_profiledata($this->session->userdata('user_id'));
		$config = [

				'upload_path' => './uploads',
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'		=>	'2048'
				];

				$this->load->library('form_validation');
				$this->load->library('upload',$config);

				$this->form_validation->set_rules('inputprofilename', 'Profile Name', 'required');
				$this->form_validation->set_rules('profiletextArea', 'Description', 'required');
				$this->form_validation->set_rules('inputkeywords', 'Keywords', 'required');
				$this->form_validation->set_rules('inputcountry', 'Country' );
				$this->form_validation->set_rules('inputcategory', 'Category');

				if ($this->form_validation->run()) {

					$post = $this->input->post();

					unset($post['updatecard']);

					if (!empty($_FILES['userfile']['name'])) {

							if ( ! $this->upload->do_upload()){
								$upload_error = $this->upload->display_errors();
								$this->session->set_flashdata('upload_error', $upload_error);
								return redirect('home/profile');
							}
							else{
								$file_data = $this->upload->data();
								$post['image_path'] = base_url('uploads')."/".$file_data['raw_name'].$file_data['file_ext'];
							}

					} else {

						$post['image_path'] = $profile->pimg;
					}
					
					$post['inputcountry']= implode(",", $post['inputcountry']);
					$post['inputcategory']= implode(",", $post['inputcategory']);
					$post['uid'] = $this->session->userdata('user_id');	
					

					$msg=$this->profilemodel->update_profile_data($post); 

					$this->session->set_flashdata('success', $msg);

					return redirect('home/profile');





				} else {

						$this->load->view('header');
						$this->load->view('view_updateprofile',['profile'=>$profile]);
						$this->load->view('footer');


				}

	}
	







}