<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-17
*/
function _alert_back($_info){
	echo "<script type='text/javascript'>alert('$_info');history.back(); </script>";
	exit();
}
function _location($_info,$_url){
	if(empty($_info)){
		echo "<script type='text/javascript'>location.href='$_url'; </script>";
	}else if(empty($_url)){
		echo "<script type='text/javascript'>alert('$_info'); </script>";
	}else{
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url'; </script>";
		exit();
	}
}
function _mysql_string($_string){
	if(!GPC){
		return  mysql_real_escape_string($_string);
	}else{
		return $_string;
	}
}
function _sha1_uniqid(){
	return _mysql_string(sha1(uniqid(rand(),true)));
}
function _session_destroy(){
	session_destroy();
}
function _cookie_destroy($_string1,$_string2,$_string3,$_url){
	if($_url!=null){
		setcookie($_string1,FALSE,time()-1);
		setcookie($_string2,FALSE,time()-1);
		setcookie($_string3,FALSE,time()-1);
		_location(null,$_url);
	}else{
		setcookie($_string1,FALSE,time()-1);
		setcookie($_string2,FALSE,time()-1);
		setcookie($_string3,FALSE,time()-1);
	}
}
function _free_result($_result){
	mysql_free_result($_result);
}
function _login_state(){
	if(isset($_COOKIE['username'])){
		_alert_back('请先退出当前帐号再进行此操作！');
	}
}
function _html($_string){
	if(is_array($_string)){
		foreach ($_string as $_key => $_value) {
			$_string[$_key]=_html($_value);
		}
	}else{
		$_string=htmlspecialchars($_string);
	}
	return $_string;
}
?>