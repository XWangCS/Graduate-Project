<?php

	// +----------------------------------------------------------------------
    // | user comment
    // +----------------------------------------------------------------------
		
	require_once('../../../config/config.php');

	$comment_content = $_POST['comment_content'];
	$movie_id = $_POST['movie_id'];
    $user_id = $_SESSION['user']['id'];
    $movie_score = $_POST['movie_score'];

	if (empty($comment_content)) {
        ajaxReturn(0, 'please enter your comment');
    }

    if(!$user_id) {
    	ajaxReturn(0,'sorry,you need login');
    }

    if(!$movie_score) {
        ajaxReturn(0,'sorry,you need mark');
    }


    //组装评论的数据
    $data = array(
        'movie_score'=>$movie_score,
    	'comment_content'=>$comment_content,
    	'movie_id'=>$movie_id,
    	'user_id'=>$user_id,
    	'addtime'=>date('Y-m-d H:i:s')
    );

    $result = insert($link,$data,'comments');


    if($result) {
    	   ajaxReturn(1,'comment success');
    }else{
    	   ajaxReturn(0,'error');
    }
