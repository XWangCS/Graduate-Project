<?php

	// +---------------------------------------------------------------------------------------------
	// | edit admin password
	// +----------------------------------------------------------------------------------------------

	require_once('../../../config/config.php');

    $password = $_POST['password'];
    $password_o = $_POST['password_o'];
    $admin_id = $_SESSION['admin']['id'];

	if(!$password) {
		ajaxReturn(0,'enter your password');
	}

	if($password != $password_o) {
		ajaxReturn(0,'repeat your password');
	}

	$data = array(
		'password'=>$password
	);

	$where = "id=".$admin_id;

	//update password
	$result = update($link,$data,'users',$where);

	if($result) {
		ajaxReturn(1,'success');
	}else{
		ajaxReturn(0,'error');
	}