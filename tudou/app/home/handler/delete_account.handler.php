<?php
	// +----------------------------------------------------------------------
    // | delete account
	// +----------------------------------------------------------------------

	require_once('../../../config/config.php');


	$user_id = $_SESSION['user']['id'];

	$where = 'id='.$user_id;

	mysql_delete($link,'users',$where);

	unset($_SESSION['user']);

	ajaxReturn(1,'success');