<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<div id="controller">
		<p>My view has been loaded</p>
		<!--
		<?php 
		foreach ($rows as $r) {
			echo "<h1>" . $r->title . "</h1>";

		}?>
		-->
		
		<?php foreach ($rows as $r) : ?>

		<h1><?php echo $r->title;?></h1>
		<div><?php echo $r->contents;?></div>
		<?php endforeach; ?>
		
	</div>
</body>
</html>