commandDelay = 1000;
lastCommand = null;

function getCommand(){
	console.log('getting command');
	$.ajax({
		url: 'api.php',
		dataType: 'json',
		success: function(data) {
			var command = data[0].command;
			if(command != lastCommand){
				console.log(command);
				lastCommand = command;
				eval(command);
			}
			setTimeout('getCommand();', commandDelay);
		},
		error: function(jXHR, textStatus, errorThrown) {
			console.log(errorThrown);
			console.log('error!');
			console.log(jXHR);
		}
	});
}

function setBackground(color){
	$('body').css('background', color);
}

$(document).ready(function(){
	getCommand();
	// setTimeout('getCommand();', 1000);
});