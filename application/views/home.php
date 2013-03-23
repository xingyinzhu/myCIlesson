<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<div id="controller">
		<p>My view has been loaded</p>
		<pre>
			<?php
				print_r($records);
			?>

			<?php foreach ($records as $row) :?>
			<h1><?php echo $row->title;?></h1>
		<?php endforeach; ?>
		</pre>
	</div>
</body>
</html>