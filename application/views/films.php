<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Films</title>
	<style type="text/css">
		*{
			font-family: Arial;
			font-size: 12px;
		}
		table{
			border-collapse: collapse;

		}
		td, th{
			border:1px solid #666666;
			padding:4px;
		}
		div {
			margin: 4px;
		}

		.sort_asc:after {
			content: "▲";
		}
		.sort_desc:after {
			content: "▼";
		}

	</style>
</head>
<body>
	<div>
		Found <?php echo $num_results ;?> films
	</div>
	<table>
		<thead>
			<?php foreach ($fields as $field_name => $field_display) :?>
			<th <?php if($sort_by == $field_name) echo "class=\"sort_$sort_order\""; ?> >
				<?php echo anchor("films/display/$field_name/" .

				(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc')

				, $field_display);?>
			</th>
			
			<?php endforeach; ?>
		</thead>
		
		<tbody>
			<?php foreach ($films as $film) : ?>
				<tr>
					<?php foreach ($fields as $field_name => $field_display) :?>
					<td>
						<?php echo $film->$field_name;?>
					</td>
					
				<?php endforeach; ?>
				</tr>
			<?php endforeach ;?>
		</tbody>
	</table>

	<?php if (strlen($pagination)) : ?>
	<div>
		Pages: <?php echo $pagination; ?>;
	</div>
	<?php endif ;?>

</body>
</html>