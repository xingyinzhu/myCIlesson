<?php

class Site extends CI_Controller {
	/*
	function index(){	
		#$data['myValue'] = 'some string';
		#$data['anotherValue'] = 'Another string';
		$this->load->model('site_model');
		$data['records'] = $this->site_model->getAll();
		$this->load->view('home',$data);
		#$this->load->view('home');


	}

	function _dosomething(){
		echo "dosomething";
	}

	function about(){
		$this->load->view('about');
	}
	*/


	//function index(){
		/*
		$this->load->model('data_model');
		$data['rows'] = $this->data_model->getAll();

		$this->load->view('home', $data);
		*/
		//$data = array();

		//if ($query = $this->site_model->get_records())
		//{
			//$data['records'] = $query;
		//}

		//$this->load->view('options_view' , $data);
	//}

	function index(){


		$this->load->library('pagination');
		$this->load->library('table');

		$this->table->set_heading('Id','The Title','The Author','The Content');

		$config['base_url'] = 'http://localhost:8888/CI/index.php/site/index';
		$config['total_rows'] = $this->db->get('data')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		/*
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		*/

		$this->pagination->initialize($config);

		$data['records'] = $this->db->get('data', $config['per_page'] , $this->uri->segment(3));
		
		$this->load->view('site_view', $data);
		//echo $this->pagination->create_links();

	}

	
	function create()
	{

		$data = array(
			'title' => $this->input->post('title'),
			'contents' => $this->input->post('content')
			);
	
		//$this->load->model('site_model');
		$this->site_model->add_record($data);

		$this->index();
		
	}

	function delete(){
		$this->site_model->delete_row();
		$this->index();
	}
	

	function update(){
		$data = array(
			'title' => 'My Freshly UPDATE Title',
			'contents' => 'Content should go here; it is updated'
			);

		$this->site_model->update_record($data);
	}

	function members_area(){
		$this->load->view('members_area');
	}

	/*
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();

	}
	*/

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../login">login</a>';
			die();
		}
	}

}

?>