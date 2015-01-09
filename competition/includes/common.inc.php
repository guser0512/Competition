<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-17
*/
header('Content-Type:text/html;charset=utf-8;');
define('ROOT_PATH',substr(dirname(__FILE__), 0,-8));
if(PHP_VERSION<'4.1.0'){
	exit('当前PHP版本低于4.1.0，请升级版本！');
}
define('GPC',get_magic_quotes_gpc());
require ROOT_PATH.'includes/global.func.php';
require ROOT_PATH.'includes/mysql.func.php';
define('DB_USER', 'root');
define('DB_PWD', 'sme0rmm');
define('DB_HOST', 'localhost');
define('DB_NAME','competition');
_connect();
_select_db();
_set_names();
?>