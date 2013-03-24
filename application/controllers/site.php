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
	function index(){
		/*
		$this->load->model('data_model');
		$data['rows'] = $this->data_model->getAll();

		$this->load->view('home', $data);
		*/
		$data = array();

		if ($query = $this->site_model->get_records())
		{
			$data['records'] = $query;
		}

		$this->load->view('options_view' , $data);
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
}

?>

