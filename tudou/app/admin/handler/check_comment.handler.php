<?php
	// +----------------------------------------------------------------------
	// |   check comments
	// +----------------------------------------------------------------------
	
	require_once('../../../config/config.php');

	//get post data
	$id = $_POST['id']; 
	if(!$id) {
		ajaxReturn(0,'sorry,param error!');
	}

	//check comment status
	$sql = "SELECT * FROM comments WHERE id='$id'";
	$result = fetchOne($link,$sql);

	if($result['status'] == 1 ) {
		$data = array('status'=>0);
		$result2 = update($link,$data,'comments','id='.$id);
		if($result2) {
			ajaxReturn(1,'success,This comment is limited.');
		}else{
			ajaxReturn(0,'error！');
		}
	}

	if($result['status'] == 0 ) {
		$data = array('status'=>1);
		$result2 = update($link,$data,'comments','id='.$id);
		if($result2) {
			ajaxReturn(1,'success,this comment is pass');
		}else{
			ajaxReturn(0,'error');
		}
	}
