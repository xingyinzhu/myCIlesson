<?php
/**
* 
*/
class Mycal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}
	
	function display($year=null,$month=null)
	{
		
		if (!$year)
		{
			$year = date('Y');
		}
		if(!$month)
		{
			$month = date('m');
		}

		$this->load->model('Mycal_model');

		if ($day = $this->input->post('day'))
		{
			$this->Mycal_model->add_calendar_data(
					"$year-$month-$day",
					$this->input->post('data')
				);
		}

		$this->benchmark->mark('generate_start');
		$data['calendar'] = $this->Mycal_model->generate($year,$month);
		$this->benchmark->mark('generate_end');
		
		//echo $this->calendar->generate(year, month, $data);

		$this->load->view('mycal', $data);
	}
}
?>