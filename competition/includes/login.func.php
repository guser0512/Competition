<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-17
*/
session_start();
if(!function_exists('_alert_back')){
	exit('_alert_back()函数不存在，请检查！');
}
if(!function_exists('_mysql_string')){
	exit('_mysql_string()函数不存在，请检查！');
}
function _setcookie($_username,$_uniqid,$_level){
			setcookie('username',$_username);
			setcookie('uniqid',$_uniqid);
			setcookie('level',$_level);
}
function _check_password($_string,$_min_len,$_max_len){
	if(strlen($_string)<$_min_len){
		_alert_back('您的密码位数不足！');
	}
	if(strlen($_string)>$_max_len){
		_alert_back('您的密码位数过长！');
	}
	return _mysql_string(sha1($_string));
}
function _check_pass_same($_first_pass,$_repeat_pass){
	if($_first_pass!=$_repeat_pass){
		_alert_back('输入的两次密码不一致！');
	}
	return _mysql_string(sha1($_first_pass));
}
function _check_time($_string){
	return _mysql_string($_string);
}
function _check_uniqid($_post_uniqid,$_session_uniqid){
	if($_post_uniqid!=$_session_uniqid){
		_alert_back('唯一标识符错误！');
	}
	return _mysql_string($_post_uniqid);
}
function _check_username($_string,$_min_len,$_max_len){
	$_string=trim($_string);
	if(mb_strlen($_string,'utf-8')<$_min_len||mb_strlen($_string,'utf-8')>$_max_len){
		_alert_back('名号长度应至少'.$_min_len.'位，至多'.$_max_len.'位!');
	}
	if(!(preg_match('/^[0-9a-zA-Z_\x{4e00}-\x{9fa5}]+$/u',$_string))){
		_alert_back('名号只能是英文，数字，下划线和中文！');
	}
	return _mysql_string($_string);
}
?>