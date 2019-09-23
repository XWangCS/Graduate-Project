<?php
    // +----------------------------------------------------------------------
    // | login
    // +----------------------------------------------------------------------

	require_once('../../../config/config.php');

	$name = $_POST['name'];

	$password = $_POST['password'];

    $role = $_POST['role'];


	if (!$name) {

        ajaxReturn(0, 'enter your name');
    }


    if (!$password) {
    	   ajaxReturn(0,'enter your password');
    }


    $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
    $result = fetchOne($link,$sql);

    if(!$result) {
    	   ajaxReturn(0,'sorry,your password fail!');
    }elseif ($result['status']==0) {
        ajaxReturn(0,'sorry,Your account has been blocked!');
    }else {
        	$user = array(
                'id'=>$result['id'],
                'name'=>$result['name'],
                'avatar' =>$result['avatar'],
                'role'=>$result['is_admin']
        );

        if($role == 1) {
            $_SESSION["user"]=$user;
            ajaxReturn(1,'login success!');
        }


        if($role == 2 ) {

            if($result['is_admin'] == 1) {

                $_SESSION["admin"]=$user;

                ajaxReturn(2,'login success!');
            }else{

                ajaxReturn(0,'sorry,you are not admin!');
            }
        }
        
    }