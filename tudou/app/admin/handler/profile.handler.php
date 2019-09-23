<?php

	// +---------------------------------------------------------------------------------------------
	// | admin info
	// +----------------------------------------------------------------------------------------------

	require_once('../../../config/config.php');


	$avatar = $_FILES['avatar'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$info = $_POST['info'];
	$id = $_SESSION['admin']['id'];
	if(!empty($avatar['tmp_name'])) {
		$img2 = uploadImg($avatar,'../../../public/uploads');
		if(!$avatar) {
			exit('image upload error');
		}
		$data = array(
			 'avatar' => $img2,
			 'phone'=>$phone,
			 'address'=>$address,
			 'info'=>$info,
			 'addtime'=>date('Y-m-d H:i:s'),
		);

		$where = "id=".$id;
		$result2 = update($link,$data,'users',$where);

		if($result2) {
			echo "<script>alert('success！');window.location.href='/tudou/app/admin/admin.php';</script>";
		}else{
			echo "<script>alert('error！');window.location.href='/tudou/app/admin/admin.php';</script>";
		}
	}

		$data = array(
			 'phone'=>$phone,
			 'address'=>$address,
			 'info'=>$info,
			 'addtime'=>date('Y-m-d H:i:s'),
		);

		$where = "id=".$id;
		$result2 = update($link,$data,'users',$where);

		if($result2) {
			echo "<script>alert('success！');window.location.href='/tudou/app/admin/admin.php';</script>";
		}else{
			echo "<script>alert('error！');window.location.href='/tudou/app/admin/admin.php';</script>";
		}


