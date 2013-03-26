<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Test</title>
</head>

<body>
	<?php echo form_open('test/form_submit'); ?>

	<?php echo validation_errors('<p>','</p>') ?>

	<p>
			Username: <?php echo form_input('username', set_value('username')); ?>
		
	</p>

	<p>
			Password: <?php echo form_password('password'); ?>

	</p>

	<p>
			<?php echo form_submit('submit', 'Create Account'); ?>
	</p>

	<?php form_close(); ?>
</body>
</html>