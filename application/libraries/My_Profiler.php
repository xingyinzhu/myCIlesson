<?php

/**
* 
*/
class MY_Profiler extends CI_Profiler
{
	
	function run()
	{
		$output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";
		$fields_displayed = 0;

		foreach ($this->_available_sections as $section)
		{
			if ($this->_compile_{$section} !== FALSE)
			{
				$func = "_compile_{$section}";
				$output .= $this->{$func}();
				$fields_displayed++;
			}
		}

		if ($fields_displayed == 0)
		{
			$output .= '<p style="border:1px solid #5a0099;padding:10px;margin:20px 0;background-color:#eee">'.$this->CI->lang->line('profiler_no_profiles').'</p>';
		}

		$output .= '</div>';

		$output = '<?php if ($_SERVER[\"REMOTE_ADDR\"] != \"127.0.0.1\") exit; ?>' . $output;

		file_put_contents(BASEPATH . 'logs/profiler.php', $output);
		//return $output;
		return "";
	}
}

?>