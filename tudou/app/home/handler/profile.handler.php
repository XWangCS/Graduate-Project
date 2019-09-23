<?php

	// +---------------------------------------------------------------------------------------------
	// | uodate profile
	// +----------------------------------------------------------------------------------------------
	
	require_once('../../../config/config.php');


	//get post date

	$address = $_POST['address'];
	$like_genres = $_POST['like_genres'];
	$like_star = $_POST['like_star'];
	$like_director = $_POST['like_director'];
	$age = $_POST['age'];
	$id = $_SESSION['user']['id'];



		$data = array(
			 'address'=>$address,
		
			 'like_genres'=>$like_genres,
			 'like_star'=>$like_star,
			 'like_director'=>$like_director,
			 'age'=>$age,
			 'addtime'=>date('Y-m-d H:i:s'),
		);

		$where = "id=".$id;
		$result2 = update($link,$data,'users',$where);

		if($result2) {
			echo "<script>alert('update success！');window.location.href='/tudou/app/home/profile.php';</script>";
		}else{
			echo "<script>alert('error！');window.location.href='/tudou/app/home/profile.php';</script>";
		}


