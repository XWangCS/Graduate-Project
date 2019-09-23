<?php
	// +----------------------------------------------------------------------
    // | admin logout 
	// +----------------------------------------------------------------------
	require_once('../../../config/config.php');

	 unset($_SESSION['admin']);
	ajaxReturn(1,'logout success！');
