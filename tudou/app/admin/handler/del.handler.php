<?php
	// +----------------------------------------------------------------------
	// | delete data
	// +----------------------------------------------------------------------
	

	require_once('../../../config/config.php');
	$id = $_POST['id']; 
	$table = $_POST['table']; 

	if(!$id && !$table) {
		ajaxReturn(0,'sorry,error');
	}
	 $result = mysql_delete($link,$table,'id='.$id);

	if($result) {
		ajaxReturn(0,'delete error');
	}else{
		ajaxReturn(1,'delete success');
	}

