<?php

/**
	* 
	*/
	class Email extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index(){
			$this->load->view('newsletter');

		}

		function send(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('newsletter');
		}
		else
		{
			//passed
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//echo "hello from send"; die();

			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from('xingyinzhu@gmail.com','xyzhu');
			$this->email->to($email);
			$this->email->subject('This is an email test');
			$this->email->message('It is working. Great');

			$path = $this->config->item('server_root');
			$file = $path . '/CI/license.txt';

			$this->email->attach($file);

			if($this->email->send()){
				//echo "Your email was sent. fool.";
				$this->load->view('signup_confirmation_view');
			}else{
				show_error($this->email->print_debugger());
			}

		}


		}
		

		
	}	
?>