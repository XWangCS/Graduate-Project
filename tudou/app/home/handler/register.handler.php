<?php

	// +----------------------------------------------------------------------
	// |register
	// +----------------------------------------------------------------------

	require_once('../../../config/config.php');

	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$password_o = $_POST['password_o'];

	if(!$name) {
		ajaxReturn(0,'enter your username！');
	}

	if(!is_password($password)) {
		ajaxReturn(0,': password lengh must be over 6 numbers including letters.！');
	}

	if(!is_email($email)) {
		ajaxReturn(0,'Please enter the correct email format!');
	}

	if($password != $password_o) {
		ajaxReturn(0,'The code you enter must be the same as the former one.');
	}


	$sql = "SELECT * FROM users WHERE email='$email'";
	$result1 = fetchAll($link,$sql);

	if($result1) {
		ajaxReturn(0,'This email has been registered！');	
	}

	$data = array(
		'name'=>$name,
		'password'=>$password,
		'email'=> $email,
		'addtime'=>date('Y-m-d H:i:s')
	);


	$result2 = insert($link,$data,'users');


	if(!$result2) {
		ajaxReturn(0,'register error！');
	}else{
		ajaxReturn(1,'register success');
	}
