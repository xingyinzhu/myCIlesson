<?php 


/**
* 
*/
class Foo
{
	var $CI;

	function Foo()
	{
		$this->CI =& get_instance();

		echo "constructor was called. <br />";
	}

	function test($value)
	{
		echo "You passed me $value. <br />";

		//$this->load->library('Config');
		$this->CI->load->library('Ftp');
		//echo "Your language is : ". $this->CI->config->item('language');
	}




}
?>