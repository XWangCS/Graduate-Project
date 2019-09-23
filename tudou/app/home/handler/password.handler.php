<?php
    // +----------------------------------------------------------------------
    // | user change password
    // +----------------------------------------------------------------------

    require_once('../../../config/config.php');

    $oldpassword = $_POST['oldpassword'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if (!$oldpassword) {
        echo "<script>alert('sorry.please enter your old password');history.back();</script>";
         exit();
    }

    if (!$password) {
           echo "<script>alert('sorry.please enter your new password');history.back();</script>";
         exit();
    }

    if ($repassword != $password) {
          echo "<script>alert('The code you enter must be the same as the former one.');history.back();</script>";
         exit();
    }

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE id='$user_id'";

    $user = fetchOne($link,$sql);

    if($oldpassword != $user['password']) {
        echo "<script>alert('sorry ,you old password is not right');history.back();</script>";
         exit();
    }


    $where = "id='$user_id'";
    $data = array(
        "password"=>$password
    );

    $result = update($link,$data,'users',$where);

    if($result) {
         echo "<script>alert('success');history.back();</script>";
         exit();
    }else{
         echo "<script>alert('error');history.back();</script>";
         exit();
    }



