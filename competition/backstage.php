<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-16
*/
ob_start();
session_start();
define("TITLE", '在线考试系统--登录');
require dirname(__FILE__).'/includes/common.inc.php';
_login_state();
if($_POST['action']=='login'){ 
	include ROOT_PATH.'includes/login.func.php';
  	$_clean=array();
  	$_clean['uniqid']=_check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
  	$_clean['username']=_check_username($_POST['username'],1,20);
  	$_clean['password']=_check_password($_POST['password'],6,20);
  	$_clean['time']=_check_time($_POST['time']);
  	if(!!$_rows=_fetch_array("SELECT * FROM tg_admin WHERE username='{$_clean['username']}' AND password='{$_clean['password']}' LIMIT 1")){
    	_sql_close();
    	_session_destroy();
    	_setcookie($_rows['username'],$_rows['uniqid'],$_rows['level'],$_clean['time']);
    	_location(null,'admin.php');
	}else{
    	_sql_close();
    	_session_destroy();
    	_location('请检查密码!','backstage.php');
	}
}else{
	$_SESSION['uniqid']=$_uniqid=_sha1_uniqid();
}
?>
<!DOCTYPE html>
<html>
	<head><? include 'includes/title.inc.php'; ?></head>
	<body>
		<div id="wrapper">
			<? include 'includes/header.inc.php'; ?>
			<div id="main-content">
					 <section>
						<h4 class="section-title">我是管理员-登录>></h4>
						<content id="card-panel">
							<form id="login" method="post" action="backstage.php">
								<input type="hidden" name="action" value="login" />
								<input type="hidden" name="uniqid" value="<?php echo $_uniqid; ?>" />
								<input type="hidden" name="username" value="admin" />
								<input type="hidden" name="time" value="0" />
								<div class="row">
								  <div class="col-lg-4">
								    <div class="input-group">
								      <input type="password" name="password" class="form-control" />
								      <span class="input-group-btn">
								        <button class="btn btn-primary" type="submit">登录</button>
								      </span>
								    </div>
								  </div>
								</div>
							</form>
						</content>
					</section> 
			</div>
			<? include 'includes/footer.inc.php'; ?>
		</div>
	</body>
</html>
<?php ob_end_flush(); ?>