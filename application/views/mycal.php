<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>My Calendar</title>
	<style type="text/css">
		.calendar{
			font-family: arial;
			font-size: 12px;
		}
		table.calendar{
			margin: auto;
			border-collapse: collapse;
		}

		.calendar .days td{
			width: 80px;
			height: 80px;
			padding: 4px;
			border: 1px solid #999;
			vertical-align: top;
			background-color: #DEF;
		}

		.calendar .days td:hover{
			background-color: #fff;
		}

		.calendar .highlight{
			font-weight: bold;
			color: #00f;
		}
	</style>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
</head>
<body>
	<?php echo $calendar;?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.calendar .day').click(function(){

				day_num = $(this).find('.day_num').html();
				//alert(day_num);
				day_data = prompt('Enter Stuff',$(this).find('.content').html());
				if(day_data != null)
				{
					$.ajax({
						url:window.location,
						type:'POST',
						data:{
							day:day_num,
							data:day_data
							},

						success:function(msg){
							location.reload();
						}


					});
				}
			});

		});
	</script>
</body>
</html>