<?php
/**
* 
*/
class Files extends CI_Controller
{

	var $file;
	var $path;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->path = "application" . DIRECTORY_SEPARATOR . 
						"test_files" . DIRECTORY_SEPARATOR;
		$this->file =  $this->path . "hello.txt";
	}

	function write_test()
	{
		$data = "Hello World!";
		write_file($this->file,$data,'a');
		echo "finished writing";
	}

	function read_test()
	{
		$string = read_file($this->file);
		echo $string;
	}

	function filenames_test()
	{
		$files = get_filenames($this->path, TRUE);
		print_r($files);
	}

	function dir_file_info_test()
	{
		$files = get_dir_file_info($this->path);
		print_r($files);

	}

	function file_info_test()
	{

		$info = get_file_info($this->file,'date');
		print_r($info);
	}
	
	function mime_test()
	{
		echo get_mime_by_extension($this->file);
	}

	function download_test()
	{
		$string = "Hello";
		force_download('hello.txt',read_file($this->file));
	}

	function display()
	{
		$data['files'] = (directory_map(BASEPATH));			
		$this->load->view('files', $data);

	}

}

?>