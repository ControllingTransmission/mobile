<?php
	include_once('../db/config.php');

	//Reload the bean
	$action = R::findOne('action');

	if(empty($action))
		$action = R::dispense('action');

	if(!empty($_POST['command'])){
		$action->command = $_POST['command'];

		//Store the bean
		$id = R::store($action);
	}

?>