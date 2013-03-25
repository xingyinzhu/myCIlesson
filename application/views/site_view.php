<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style1.css">
</head>
<body>
	<div id="container">
		<h1>Super Pagination with CodeIgniter</h1>
		<?php echo $this->table->generate($records); ?>

		<?php echo $this->pagination->create_links(); ?>
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript" charset="utf-8">
	$('tr:odd').css('background','#e3e3e3');
</script>

</body>

</html>