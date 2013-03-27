<?php
	
/**
* 
*/
class Test extends CI_Controller
{
	
	function area_of_circle($radius)
	{
		$this->load->helper('math');	

		echo "A circle with radius $radius has area" . circle_area($radius);
	}

	function show_mysql_date()
	{
		$this->load->helper('date');
		echo "Current date in Mysql format: " . date_mysql();
	}

	function new_library()
	{
		$this->load->library('Foo');

		$this->foo->test('bar');

	}

	function form()
	{
		$this->load->library('Form_validation');

		//$this->form_validation->test();

		$this->load->view('test_form');
	}

	function form_submit()
	{
		$this->load->library('Form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required|aphpa_numaric|min_length[6]');

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|strong_pass[3]');

		if (!$this->form_validation->run())
		{
			$this->load->view('test_form');
		}
		else
		{
			// ...
			echo "success";

		}

		
	}

	function allowed_chars($param)
	{
		echo "You passed me '$param'.";
	}

	
	function sha1_test($param)
	{
		echo sha1($param);

		echo "<br>";

		$this->load->library('encrypt');
		echo $this->encrypt->sha1($param);
	}

	function encode()
	{
		$message = "This is a secret message.";
		$this->load->library('encrypt');
		echo $this->encrypt->encode($message);

	}

	function decode()
	{
		$this->load->library('encrypt');

		$encode_message = "nH4+s1XQga3V2MewcHmmgmR3yLkJ38qiZ2rmQFw2JnqkDGVRh2VEqIWGdNZ9wn8S5Acp4dYcxMJtnVlUSC8m1w==";
		echo $this->encrypt->decode($encode_message);
	}

	function encode_with_key($key)
	{
		$message = "This is a secret message.";
		$this->load->library('encrypt');
		echo $this->encrypt->encode($message,$key);

	}

	function decode_with_key($key)
	{
		$this->load->library('encrypt');

		$encode_message = "1agG4nNxU8chobnDJuNVBqHmQleKREspFCTmx0rAVwkey62omwI+AFrmIljmuJfOKDk/P0nufyXo607qfKVGsw==";
		echo $this->encrypt->decode($encode_message,$key);
	}

	function sql()
	{
		$name = 'Burak';

		//unsave
		$query = "SELECT * FROM users WHERE name = '$name'";

		$query = "SELECT * FROM users 
			WHERE name = '" . mysql_real_escape_string($name) . "'";

		$this->load->database();
		$query = "SELECT * FROM users 
			WHERE name = '" . $this->db->escape_str($name) . "'";

		$query = "SELECT * FROM users 
			WHERE name = " . $this->db->escape($name) . "";

		$query = "SELECT * FROM users 
			WHERE name LIKE '%' " . $this->db->escape_like_str($name) . "%'";

		//no escaping needed

		$this->db->select('*')->from('users')->where('name',$name);

	}

	function xss_filter()
	{
		//filtered by config.php
		$this->input->post('comment');

		//xss
		$this->input->post('comment',true);

		$clean_string = $this->input->xss_clean($string);

	}


	function output()
	{
		//php function
		//htmlspecialchars(string);

		//automatically filtered
		echo anchor($url);
		echo form_input('name', set_value('name'));
	}

	function session()
	{
		$this->load->library('session');

		$this->session->set_userdata('user_id',2);
	}

	function session_read()
	{
		$this->load->library('session');

		$user_id = $this->session->userdata('user_id');

		if ($user_id == 1)
		{
			echo "You have all access";
		}
		else
		{
			echo "You have limited access. User id : $user_id";
		}
	}

	function error()
	{
		foobar();
	}
}

?>