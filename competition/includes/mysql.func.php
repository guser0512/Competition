<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-17
*/
function _connect(){
	global $_conn;
	$_conn=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('fail to connect the database!');
}
function _select_db(){
	mysql_select_db(DB_NAME) or die('selected database not exist！');
}
function _set_names(){
	mysql_query('SET NAMES UTF8') or die('set names error!');
}
function _query($_sql){
	if(!$_result=mysql_query($_sql)){
		echo mysql_error();
	}
	return $_result;
}
function _fetch_array($_sql){
	return mysql_fetch_array(_query($_sql),MYSQL_ASSOC);
}
function _fetch_array_list($_result){
	return mysql_fetch_array($_result,MYSQL_ASSOC);
}
function _num_rows($_result){
	if(!$_num=mysql_num_rows($_result)){
		mysql_error();
	}
	return $_num;
}
function _is_repeat($_sql,$_info){
	if(_fetch_array($_sql)){
		_alert_back($_info);
	}
}
function _sql_close(){
	if(!mysql_close()){
		exit('SQL关闭异常！');
	}
}
?>