commandDelay = 1000;
lastCommand = null;
colorset = ['#000'];
colorsetIndex = 0;
rotationRate = 1000;

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

function rotateBackground(){
	setBackground(colorset[colorsetIndex]);
	colorsetIndex++;
	if(colorsetIndex >= colorset.length)
		colorsetIndex = 0;
	setTimeout('rotateBackground()', rotationRate);
}

$(document).ready(function(){
	getCommand();
	// setTimeout('getCommand();', 1000);
	setTimeout('window.location = window.location;', 30000);
	window.scrollTo(0, 1);
});