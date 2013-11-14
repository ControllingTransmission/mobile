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
						$('#command-text').val('');
					},
					error: function(jXHR, textStatus, errorThrown) {
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
		<textarea id="command-text" style="height:200px; width:40%"></textarea>
		<br/>
		<input type="submit" value="last command" onclick="getCommand();" />
		<input type="submit" value="eval" onclick="console.log('eval'); eval($('#command-text').val());" />
		<input type="submit" value="submit" onclick="submitCommand();" />
		<br/>
		<hr>
		<input type="submit" value="background color" onclick="$('#command-text').val('$(\'body\').css(\'background\', \'#f00\');');" />
	</body>
</html>