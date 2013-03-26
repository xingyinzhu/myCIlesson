<?php 

function date_mysql($time = NULL)
{
	if (!$time)
	{
		$time = time();
	}

	return date('Y-m-d H:i:s',$time);
}


?>