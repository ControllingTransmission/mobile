<?php 
	include_once('db/config.php');

	//Reload the bean
	$action = R::findOne('action');

	if(empty($action)){
		$action = R::dispense('action');
		$action->command = "setBackground('#f00');";
	}

	echo json_encode(R::exportAll($action));

?>