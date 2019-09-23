<?php

	function validateAdmin() {
	    if (empty($_SESSION['admin']) && @$_SESSION['admin']['role'] != 1){
	        redirect('/app/home/login.php');
	    } 
	}
	function validateUser() {
	    if (empty($_SESSION['user']) && @$_SESSION['user']['role'] != 0){
	        redirect('/app/home/login.php');
	    } 
	}
