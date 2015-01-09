<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-16
*/
ob_start();
session_start();
define("TITLE", '在线考试系统--首页');
define("NAV","home");
require dirname(__FILE__).'/includes/common.inc.php';
if($_POST['action']=='login'){
	include ROOT_PATH.'includes/login.func.php';
  	$_clean=array();
  	$_clean['uniqid']=_check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
	$_clean['username']=_check_username($_POST['username'],1,20);
  	$_clean['password']=_check_password($_POST['password'],6,20);
  	if(!!$_rows=_fetch_array("SELECT * FROM tg_user WHERE username='{$_clean['username']}' AND password='{$_clean['password']}' LIMIT 1")){
    	_sql_close();
    	_session_destroy();
    	_setcookie($_rows['username'],$_rows['uniqid'],$_rows['level']);
    	_location(null,'user.php');
	}else if(!_fetch_array("SELECT * FROM tg_user WHERE username='{$_clean['username']}'")){
    	_sql_close();
    	_session_destroy();
    	_location('此用户不存在！','index.php');
	}else if(!_fetch_array("SELECT * FROM tg_user WHERE password='{$_clean['password']}'")){
		_sql_close();
    	_session_destroy();
    	_location('密码错误！','index.php');
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
				<div id="left-content" class="border-right">
					<section>
						<h4 class="section-title">我是参赛人员-登录>></h4>
						<content>
						<form id="login" method="post" action="index.php" class="form-horizontal margin-top-20px" role="form">
						  <input type="hidden" name="action" value="login" />
								<input type="hidden" name="uniqid" value="<?php echo $_uniqid; ?>" />
						  <div class="form-group">
						    <div class="col-sm-6">
						    	<input type="text" name="username" class="form-control" placeholder="填写你的姓名">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-6">
						      <input type="password" name="password" class="form-control" placeholder="填写你的密码">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-6">
						      <button type="submit" class="btn btn-default">登录</button>&nbsp;&nbsp;没有帐号？<a href="register.php">注册</a>
						    </div>
						  </div>
						</form>
						</content>
					</section>
				</div>
				<div id="right-content">
					<section>
						<h4 class="section-title">欢迎使用！</h4>
						<content>
							<p>1. 考试流程：报名<img src="images/next.png" />&nbsp;登录<img src="images/next.png" />&nbsp;选择考试<img src="images/next.png" />&nbsp;时间到/交卷<img src="images/next.png" /> 查看成绩。</p>
							<p>2. 本在线考试系统是一款简洁性、易用性和功能性之间取得平衡的产品。采用功能强大、高效灵活的PHP/MySQL架构和B/S模式，应用于局域网。</p>
							<p>3. 支持浏览器: Chrome，FireFox，IE10，360浏览器(极速模式)。</p>
						</content>
					</section>
				</div>
			</div>
			<? include 'includes/footer.inc.php'; ?>
		</div>
	</body>
</html>
<?php ob_end_flush(); ?>