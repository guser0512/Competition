<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-16
*/
ob_start();
session_start();
define("TITLE", '在线考试系统--注册');
define("NAV","reg");
require dirname(__FILE__).'/includes/common.inc.php';
_login_state();
if($_POST['action']=='register'){
	include ROOT_PATH.'includes/register.func.php';
	$_clean=array();
	$_clean['uniqid']=_check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
	$_clean['username']=_check_username($_POST['username'],1,20);
	$_clean['password']=_check_password($_POST['password'],$_POST['repassword']);
	_is_repeat("SELECT username FROM tg_user WHERE username='{$_clean['username']}' LIMIT 1",'此姓名已被使用，换一个。');
    _query("CREATE TABLE `{$_clean['uniqid']}` (`id` INT( 5 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,`question_id` INT( 4 ) NOT NULL DEFAULT '-9999',`xz` INT( 1 ) NOT NULL DEFAULT '-9999',`pd` INT( 1 ) NOT NULL DEFAULT '-9999') ENGINE = MYISAM ;");
    _query("INSERT INTO tg_user(
                                      uniqid,
                                      password,
                                      username,
                                      reg_time
                                      ) VALUES(
                                      '{$_clean['uniqid']}',
                                      '{$_clean['password']}',
                                      '{$_clean['username']}',
                                      NOW()
                                      )");
    if (mysql_affected_rows()==1) { 
      _sql_close();
      _session_destroy();
      _location('注册成功，请登录！','index.php');
  	}else{
      _sql_close();
      _session_destroy();
      _location('注册失败，请重试！','register.php');
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
						
					<h4 class="section-title">没有账号？注册>></h4>
						<content>
						<form id="register" method="post" action="register.php" class="form-horizontal margin-top-20px" role="form">
							<input type="hidden" name="action" value="register" />
							<input type="hidden" name="uniqid" value="<?php echo $_uniqid ?>" />
						  <div class="form-group">
						    <div class="col-sm-8">
						    	<div class="input-group">
						    		<span class="input-group-addon">姓名</span>
						    		<input type="text" name="username" class="form-control" placeholder="只能是英文，数字，下划线和中文，且至多20位">
						    	</div>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-8">
						    	<div class="input-group">
						    		<span class="input-group-addon">密码</span>
						    		<input type="password" name="password" class="form-control" placeholder="至少6位，至多20位">
						    	</div>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-8">
						    	<div class="input-group">
						    		<span class="input-group-addon">确认</span>
						    		<input type="password" name="repassword" class="form-control" placeholder="重新输入一遍密码">
						    	</div>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-8">
						      <button type="submit" class="btn btn-default">注册</button>&nbsp;&nbsp;已有帐号？<a href="index.php">登录</a>
						    </div>
						  </div>
						</form>
						</content>
						<h6>　 声明：你所填写的个人信息均以不可逆的方式加密后存放在数据库，所以你的个人信息是安全的！</h6>
					</section>
				</div>
				<div id="right-content">
					<section>
						<h4 class="section-title">考试须知！</h4>
						<content>
							<p>1. 没有账号，按要求填写姓名，密码来报名注册。</p>
							<p>2. 已有账号，正确填写姓名及密码登录到考试系统。</p>
							<p>3. 根据比赛要求选择相应的考试科目。</p>
							<p>4. 在比赛要求的时间内认真答题，当时间用完系统自动收卷。</p>
							<p>5. 交卷后系统给出你的总成绩,以及详细情况。</p>
							<p>6. 支持浏览器: Chrome，FireFox，IE10，360浏览器(极速模式)。</p>
						</content>
					</section>
				</div>
			</div>
			<? include 'includes/footer.inc.php'; ?>
		</div>
	</body>
</html>
<?php ob_end_flush(); ?>