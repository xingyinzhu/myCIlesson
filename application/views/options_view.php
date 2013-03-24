<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<style type="text/css">
		label{display: block;}
	</style>
</head>

<body>
	<h2>Create</h2>
	<?php echo form_open('site/create'); ?>

	<p>
		<label for="title">Title: </label>
		<input type="text" name="title" id="title" />
	</p>

	<p>
		<label for="content">Title: </label>
		<input type="text" name="content" id="content" />
	</p>
	
	<p>
		<input type="submit" value="Submit" /> 

	</p>
	<?php echo form_close(); ?>

	<hr />

	<h2>Read</h2>

	<?php if(isset($records)) : foreach ($records as $row) : ?>
	<h2><?php echo  anchor('site/delete/'.$row->id, $row->title);?></h2>
	<div>
		<?php echo $row->contents;?>
	</div>
	<?php endforeach; ?>

	<?php else : ?>	
	<h2>No records were returned.</h2>
	<?php endif;?>
	
	<hr />

	<h2>Delete</h2>

	<p>
		To sample the delete method, simply click on one of the headings listed aboved. A delete query will automatically run.
	</p>
</body>
</html>