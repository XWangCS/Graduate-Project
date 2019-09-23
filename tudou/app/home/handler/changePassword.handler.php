<?php
	// +----------------------------------------------------------------------
    // | user change password
    // +----------------------------------------------------------------------
		
	require_once('../../../config/config.php');

	$email = $_POST['email'];

     $password = $_POST['password'];

	$password_o = $_POST['password_o'];


	if (empty($password)) {
        echo "<script>alert('please enter your password');history.back();</script>";
        exit();
    }
    
    if (empty($password_o)) {
        echo "<script>alert('Please repeat your password');history.back();</script>";
        exit();
    }

    if($password != $password_o) {
        echo "<script>alert('Entered passwords differ.');history.back();</script>";
        exit();
    }

    $sql = "SELECT * FROM users WHERE email='$email'";
    $user = fetchOne($link,$sql);

    $id = $user['id'];
    $where = "id=".$id;

    $data = array(
        'password'=>$password,
    );               

    $result =  update($link,$data,'users',$where);

    if($result){
        echo "<script>alert('Password Update Successful');window.location.href='/tudou/app/home/login.php';</script>";
        exit();
    }else{
         echo "<script>alert('error');history.back();</script>";
         exit();
    }

