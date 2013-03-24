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
		$this->load->model('data_model');
		$data['rows'] = $this->data_model->getAll();

		$this->load->view('home', $data);
	}

}

?>

