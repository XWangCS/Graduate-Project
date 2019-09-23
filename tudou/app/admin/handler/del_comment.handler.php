<?php
	// +----------------------------------------------------------------------
	// |    delete user comment
	// +----------------------------------------------------------------------
	

	require_once('../../../config/config.php');

	$id = $_POST['id'];
	$table = $_POST['table'];

	
	if(!$id && !$table) {
		ajaxReturn(0,'sorry,error!');
	}

	 $result = mysql_delete($link,$table,'id='.$id);

	if($result) {
		ajaxReturn(1,'delete success!');
	}else{
		ajaxReturn(0,'delete error!');
	}