<?php
	// +----------------------------------------------------------------------
	// | block user
	// +----------------------------------------------------------------------
	
	require_once('../../../config/config.php');

	$id = $_POST['id']; 
	$where = "id=".$id;

	if(!$id) {
		ajaxReturn(0,'sorry,error');
	}

	$sql = "SELECT * FROM users WHERE id='$id'";
	$user = fetchOne($link,$sql);

	if($user['status'] == 1) {	
		$data = array(
			"status"=>0,
		);
	     $result = update($link,$data,'users',$where);
	     if($result){
	     	ajaxReturn(1,'block success');
	     }else{
	     	ajaxReturn(0,'block field');
	     }
	}


	if($user['status'] == 0) {	
		$data = array(
			"status"=>1,
		);
	     $result = update($link,$data,'users',$where);
	     if($result){
	     	ajaxReturn(1,'remove block success');
	     }else{
	     	ajaxReturn(0,'remove block  field');
	     }
	}