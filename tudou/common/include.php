<?php

require_once(APP_ROOT.'/common/mysql.php');
require_once(APP_ROOT.'/common/helpers.php');
require_once(APP_ROOT.'/common/auth.php');

$link=connect();

if(!isset($_SESSION)) { 
    session_start();  
}
