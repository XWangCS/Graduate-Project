<?php
	// +----------------------------------------------------------------------
	// |  delete user
	// +----------------------------------------------------------------------
	

	require_once('../../../config/config.php');

	$id = $_POST['id'];
	$table = $_POST['table'];

	if(!$id && !$table) {
		ajaxReturn(0,'error');
	}

	 $result = mysql_delete($link,$table,'id='.$id);

	if($result) {
		ajaxReturn(1,'success ');
	}else{
		ajaxReturn(0,'error');
	}