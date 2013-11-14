<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="main.js"></script>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<style type="text/css">
			@font-face {
				font-family: Outage;
				src:url('fonts/Outage Cut.ttf');
			}
			body{
				background:#000;
				color:#fff;
				font-family: Outage;
				height:120%;
			}
			img{
				border:0px;
				padding:0px;
			}

		</style>
		<script type="text/javascript">
			<?php 
				include_once('db/config.php');

				//Reload the bean
				$action = R::findOne('action');

				if(!empty($action)){
					echo $action->command;
				}
			?>
			
		</script>
	</head>
	<body>
		<div id="bandname">BITSHIFTER</div>
	</body>
</html>