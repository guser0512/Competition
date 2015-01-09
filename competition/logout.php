<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-17
*/
ob_start();
require dirname(__FILE__).'/includes/common.inc.php';
if($_COOKIE['level']==0){
	_cookie_destroy('username','uniqid','level','index.php');
}else if($_COOKIE['level']==1){
	_cookie_destroy('username','uniqid','level','backstage.php');
}
ob_end_flush();
?>