<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-24
*/
function _check_content($_string){
	$_string=trim($_string);
	if(mb_strlen($_string,'utf-8')==0){
		_alert_back('内容不能为空!');
	}
	return _mysql_string($_string);
}
?>