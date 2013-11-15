<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

			});

			function submitCommand(){
				$.ajax({
					url: 'api.php',
					dataType: 'json',
					type: 'POST',
					data: {
						command: $('#command-text').val(),
					},
					success: function(data) {
						$('#command-text-last').val($('#command-text').val());
						$('#command-text').val('');
					},
					error: function(jXHR, textStatus, errorThrown) {
						$('#command-text-last').val($('#command-text').val());
						$('#command-text').val('');
						console.log(errorThrown);
						console.log('error!');
						console.log(jXHR);
					}
				});
			}

			function getCommand(){
				console.log('getting command');
				$.ajax({
					url: '../api.php',
					dataType: 'json',
					success: function(data) {
						var command = data[0].command;
						console.log(data);
						$('#command-text').val(command);
					},
					error: function(jXHR, textStatus, errorThrown) {
						console.log(errorThrown);
						console.log('error!');
						console.log(jXHR);
					}
				});
			}
		</script>
	</head>

	<body>
		<textarea id="command-text" style="height:200px; width:40%; float:left;"></textarea>
		<textarea id="command-text-last" style="height:200px; width:40%; float:left;"></textarea>
		<br style="clear:both"/>
		<input type="submit" value="last command" onclick="getCommand();" />
		<input type="submit" value="eval" onclick="console.log('eval'); eval($('#command-text').val());" />
		<input type="submit" value="submit" onclick="submitCommand();" />
		<br/>
		<hr>
		<input type="submit" value="background color" onclick="$('#command-text').val('$(\'body\').css(\'background\', \'#f00\');');" />
	</body>
</html>