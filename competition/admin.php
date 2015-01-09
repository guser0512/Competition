<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-18
*/
define("TITLE", '在线考试系统--后台管理');
define("NAV",'admin');
require dirname(__FILE__).'/includes/common.inc.php';
if($_COOKIE['level']!=1){_location('你没有权限访问此页面！','backstage.php');}
$_rows=_fetch_array("SELECT * FROM tg_admin WHERE username='{$_COOKIE['username']}'");
$_group=_query("SELECT * FROM tg_user");
$_competed=_query("SELECT * FROM tg_user WHERE is_competed=1");
$_question_xz=_query("SELECT * FROM tg_question_xz");
$_question_pd=_query("SELECT * FROM tg_question_pd");
$_group_num=_num_rows($_group);
$_competed_num=_num_rows($_competed);
$_question_xz_num=_num_rows($_question_xz);
$_question_pd_num=_num_rows($_question_pd);
$_competition_time=_fetch_array("SELECT value FROM tg_systerm_c WHERE name='competition_time'");
if($_POST['action']=='alert-competition-time'){
	$_time=$_POST['time'];
	if($_time==$_competition_time['value']){
		_location("比赛时间没有改变，请选择和原来不同的值！","admin.php");
	}else{
		if(is_numeric($_time)){
			_query("UPDATE tg_systerm_c SET value=$_time WHERE name='competition_time'");
			if(mysql_affected_rows()==1){
				_sql_close();
				_location("修改成功！","admin.php");
			}else{
				_sql_close();
				_location("修改失败，请重试！","admin.php");
			}
		}else{
			_location("请确保你输入的数字！",Null);
		}
	}
}
if($_POST['action']=='alert-admin-pass'){
	include ROOT_PATH.'includes/login.func.php';
	$_pass=array();
	$_pass['old_pass']=_mysql_string(sha1($_POST['old_pass']));
	$_pass['new_pass']=_check_password($_POST['new_pass'],6,20);
	$_pass['repeat_pass']=_check_pass_same($_POST['new_pass'],$_POST['repeat_pass']);
	if(!!$_check=_fetch_array("SELECT * FROM tg_admin WHERE username='admin' AND password='{$_pass['old_pass']}' LIMIT 1")){
		_query("UPDATE tg_admin SET password='{$_pass['repeat_pass']}' WHERE username='admin'");
	}else{
		_location("当前密码不正确，请重试！","admin.php");
	}
	if(mysql_affected_rows()==1){
		_sql_close();
		_cookie_destroy('username','uniqi','level',null);
		_location("修改成功，请重新登录！","backstage.php");
	}else{
		_sql_close();
		_location("修改失败，请重试！","admin.php");
	}
}
if($_POST['action']=='add-xz'){
	include ROOT_PATH.'includes/add-question.func.php';
	$_add_xz=array();
	$_add_xz['content']=_check_content($_POST['content']);
	$_add_xz['mark_a']=_check_content($_POST['mark_a']);
	$_add_xz['mark_b']=_check_content($_POST['mark_b']);
	$_add_xz['mark_c']=_check_content($_POST['mark_c']);
	$_add_xz['mark_d']=_check_content($_POST['mark_d']);
	$_add_xz['answer']=$_POST['answer'];
	_query("INSERT INTO tg_question_xz(
											content,
											mark_a,
											mark_b,
											mark_c,
											mark_d,
											answer
											) VALUES(
											'{$_add_xz['content']}',
											'{$_add_xz['mark_a']}',
											'{$_add_xz['mark_b']}',
											'{$_add_xz['mark_c']}',
											'{$_add_xz['mark_d']}',
											'{$_add_xz['answer']}'
											)");
	if (mysql_affected_rows()==1) { 
		_sql_close();
		_location('添加成功！','admin.php');
	}else{
		_sql_close();
		_location('添加失败！','admin.php');
	}
}
if($_POST['action']=='add-pd'){
	include ROOT_PATH.'includes/add-question.func.php';
	$_add_pd=array();
	$_add_pd['content']=_check_content($_POST['content']);
	$_add_pd['answer']=$_POST['answer'];
	_query("INSERT INTO tg_question_pd(
											content,
											answer
											) VALUES(
											'{$_add_pd['content']}',
											'{$_add_pd['answer']}'
											)");
	if (mysql_affected_rows()==1) { 
		_sql_close();
		_location('添加成功！','admin.php');
	}else{
		_sql_close();
		_location('添加失败！','admin.php');
	}
}
if($_POST['action']=='delete-xz'){
	_query("TRUNCATE TABLE tg_question_xz");
	_location('清除成功！','admin.php');
}
if($_POST['action']=='delete-pd'){
	_query("TRUNCATE TABLE tg_question_pd");
	_location('清除成功！','admin.php');
}
if($_POST['action']=='reset-grade'){
	_query("UPDATE `tg_user` SET `grade`=-9999,`is_competed`=0,`correct`=NULL,`wrong`=NULL,`skip`=NULL");
	if (mysql_affected_rows()!=0){
		_sql_close();
		_location('重置成功！','admin.php');
	}else{
		_sql_close();
		_location('重置失败！','admin.php');
	}
}
if($_POST['action']=='delete-user'){
	_query("TRUNCATE TABLE tg_user");
	while(!!$_group_list=_fetch_array_list($_group)){
		$_html=array();
		$_html['uniqid']=$_group_list['uniqid'];
		$_html=_html($_html);
		_query("DROP TABLE `{$_html['uniqid']}`");
	}
	_location('清除成功！','admin.php');
}
?>
<!DOCTYPE html>
<html>
	<head><? include 'includes/title.inc.php'; ?></head>
	<body>
		<div id="wrapper">
			<? include 'includes/header.inc.php'; ?>
			<div id="main-content">
				<div id="side-bar">
					<nav>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#user-info" data-toggle="tab">参赛人员信息</a></li>
							<li class><a href="#alert-time" data-toggle="tab">修改比赛时间</a></li>
							<li class><a href="#alert-pass" data-toggle="tab">修改登录密码</a></li>
							<li class><a href="#question-bank" data-toggle="tab">管理题库</a></li>
							<li class><a href="#check-grade" data-toggle="tab">查看成绩</a></li>
						</ul>
					</nav>
				</div>
				<div id="content-panel" class="tab-content">
					<div class="tab-pane fade in active" id="user-info">
							<?
								if($_group_num!=0){
									echo "<div class='alert alert-gray alert-dismissable margin-top-20px'>";
									echo  "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
									echo "<p><strong>你可以使用 Ctrl+P 打印页面（PDF格式）。</strong></p>";
									echo "<p>打印选项：</p><p><small>'目标' 更改为 '另存为PDF'。</small></p><p><small>'边距' 选择 '无'。</small></p>";
									echo "</div>";
									echo "<div class='panel panel-default margin-top-20px'>";
									echo "<div class='panel-heading'>共有".$_group_num."人报名参赛 >></div>";
									echo '<table class="table table-bordered table-hover table-condensed">';
									echo 	'<tr>';
									echo 		'<td>姓名</td>';
									echo 		'<td>注册时间</td>';
									echo 		'<td>是否可以考试</td>';
									echo 	'</tr>';

												while(!!$_group_list=_fetch_array_list($_group)){
													$_html=array();
													$_html['username']=$_group_list['username'];
													$_html['reg_time']=$_group_list['reg_time'];
													$_html['is_competed']=$_group_list['is_competed'];
													$_html=_html($_html);
													echo "<tr>";
													echo "<td>".$_html['username']."</td>";
													echo "<td>".$_html['reg_time']."</td>";
													if($_html['is_competed']==0){
														echo "<td>可以</td>";
													}else{
														echo "<td>不可</td>";
													}
													echo "</tr>";
												}
									echo '</table>';
									echo '</div>';
									echo '<form method="post" action="admin.php">';
									echo 	'<input type="hidden" name="action" value="delete-user" />';
									echo 	'<input type="submit" value="清除所有用户" class="btn btn-danger" />&nbsp;&nbsp;<small>执行后不可恢复，请谨慎操作</small>';
									echo '</form>';

								}else{
									echo "<div class='margin-top-20px'>共有".$_group_num."人报名参赛 >></div>";
								}
								?>
					</div>
					<div class="tab-pane fade" id="alert-time">
						<h4>当前一场考试的时间是 <?php echo $_competition_time['value'];?> 分钟</h4>
						<form method="post" action="admin.php">
							<input type="hidden" name="action" value="alert-competition-time" />
							<dl>
								<dd><p>我要把一场考试的时间修改成 >></p></dd>
								<div class="row">
									<div class="col-lg-4">
										<div class="input-group">
										  <input type="text" name="time" class="form-control" placeholder="请输入一个正整数">
										  <span class="input-group-addon">分钟</span>
										</div>
									</div>
								</div>
								<dd><input type="submit" value="确认修改" class="btn btn-primary margin-top-20px" /></dd>
							</dl>
						</form>
					</div>
					<div class="tab-pane fade" id="alert-pass">
						<h4>如果你没有修改初始密码，请尽快修改 >></h4>
						<form method="post" action="admin.php" class="form-horizontal margin-top-20px" role="form">
						  <input type="hidden" name="action" value="alert-admin-pass" />
						  <div class="form-group">
						    <div class="col-sm-4">
						      <input type="password" name="old_pass" class="form-control" placeholder="当前密码">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-4">
						      <input type="password" name="new_pass" class="form-control" id="inputPassword3" placeholder="新密码，至少6位，至多20位">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-4">
						      <input type="password" name="repeat_pass" class="form-control" placeholder="重新输入新密码">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-4">
						      <button type="submit" class="btn btn-primary">确认修改</button>
						    </div>
						  </div>
						</form>
					</div>
					<div class="tab-pane fade" id="question-bank">
						<div id="question-bank-center">
							<h4>当前题库共有选择题 <strong><?php echo $_question_xz_num; ?></strong> 道，判断题 <strong><?php echo $_question_pd_num; ?></strong> 道</h4>
						</div>
						<div id="question-bank-left">
							<p><button id="button-add-question-xz" type="button" class="btn btn-primary">>> 添加一道选择题到题库</button></p>
	 						<div id="add-question-xz" class="hidden">
								<form method="post" action="admin.php" class="form-horizontal margin-top-20px" role="form">
								  <input type="hidden" name="action" value="add-xz" />
								  <div class="form-group">
								    <div class="col-sm-10">
								  	  <textarea name="content" class="form-control" rows="3" placeholder="题目内容..."></textarea>
								  	</div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								      <input type="text" name="mark_a" class="form-control" placeholder="选项 1">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								      <input type="text" name="mark_b" class="form-control" placeholder="选项 2">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								      <input type="text" name="mark_c" class="form-control" placeholder="选项 3">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								      <input type="text" name="mark_d" class="form-control" placeholder="选项 4">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								    	<label class="radio-inline">
										  <input type="radio" name="answer" value="1" checked="checked"> 1
										</label>
										<label class="radio-inline">
										  <input type="radio" name="answer"  value="2"> 2
										</label>
										<label class="radio-inline">
										  <input type="radio" name="answer" value="3"> 3
										</label>
										<label class="radio-inline">
										  <input type="radio" name="answer" value="4"> 4
										</label>
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								      <button type="submit" class="btn btn-primary">确认添加</button>
								    </div>
								  </div>
								</form>
	 						</div>
							<p><button id="button-add-question-pd" type="button" class="btn btn-primary">>> 添加一道判断题到题库</button></p>
							<div id="add-question-pd" class="hidden">
								<form method="post" action="admin.php" class="form-horizontal margin-top-20px" role="form">
								  <input type="hidden" name="action" value="add-pd" />
								  <div class="form-group">
								    <div class="col-sm-10">
								  	  <textarea name="content" class="form-control" rows="3" placeholder="题目内容..."></textarea>
								  	</div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								    	<label class="radio-inline">
										  <input type="radio" name="answer" value="1" checked="checked"> 正确
										</label>
										<label class="radio-inline">
										  <input type="radio" name="answer"  value="0"> 错误
										</label>
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-10">
								      <button type="submit" class="btn btn-primary">确认添加</button>
								    </div>
								  </div>
								</form>
							</div>
						</div><!--#question-bank-left-->
						<div id="question-bank-right">
								<?
									echo '<form method="post" action="admin.php">';
									echo 	'<input type="hidden" name="action" value="delete-xz" />';
									if($_question_xz_num==0){
										echo '<p><input type="submit" value="删除全部选择题" class="btn btn-danger disabled" />&nbsp;&nbsp;<small>不可操作，题库没有选择题　</small></p>';
									}else{
										echo '<p><input type="submit" value="删除全部选择题" class="btn btn-danger" />&nbsp;&nbsp;<small>执行后不可恢复，请谨慎操作</small></p>';
									}
									echo '</form>';

									echo '<form method="post" action="admin.php">';
									echo 	'<input type="hidden" name="action" value="delete-pd" />';
									if($_question_pd_num==0){
									echo 	'<p><input type="submit" value="删除全部判断题" class="btn btn-danger disabled" />&nbsp;&nbsp;<small>不可操作，题库没有选择题　</small></p>';
									}else{
										echo '<p><input type="submit" value="删除全部判断题" class="btn btn-danger" />&nbsp;&nbsp;<small>执行后不可恢复，请谨慎操作</small></p>';
									}
									echo '</form>';
								?>
						</div><!--#question-bank-right-->
					</div>
					<div class="tab-pane fade" id="check-grade">
						<?php	
							if($_competed_num!=0){
								echo "<div class='alert alert-gray alert-dismissable margin-top-20px'>";
								echo  "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
								echo "<p><strong>你可以使用 Ctrl+P 打印页面（PDF格式）。</strong></p>";
								echo "<p>打印选项：</p><p><small>'目标' 更改为 '另存为PDF'。</small></p><p><small>'边距' 选择 '无'。</small></p>";
								echo "</div>";
								echo "<div class='panel panel-default margin-top-20px'>";
								echo "<div class='panel-heading'>共有".$_competed_num."人已经参加了考试 >></div>";
								echo '<table class="table table-bordered table-hover table-condensed">';
									echo '<tr>';
										echo '<td>姓名</td>';
										echo '<td>成绩</td>';
										echo '<td>正确题数</td>';
										echo '<td>错误题数</td>';
										echo '<td>跳过题数</td>';
										echo '<td>总题数</td>';
										echo '<td>正确率</td>';
									echo '</tr>';
								while(!!$_competed_list=_fetch_array_list($_competed)){
									$_html=array();
									$_html['username']=$_competed_list['username'];
									$_html['grade']=$_competed_list['grade'];
									$_html['correct']=$_competed_list['correct'];
									$_html['wrong']=$_competed_list['wrong'];
									$_html['skip']=$_competed_list['skip'];
									$_html['count']=$_html['correct']+$_html['wrong']+$_html['skip'];
									if($_html['count']==0){
										$_html['rate']=sprintf("%.3f",0);
									}else{
										$_html['rate']=sprintf("%.3f",$_html['correct']/$_html['count']);
									}
									$_html=_html($_html);
									echo "<tr>";
									echo "<td>".$_html['username']."</td>";
									echo "<td>".$_html['grade']."</td>";
									echo "<td>".$_html['correct']."</td>";
									echo "<td>".$_html['wrong']."</td>";
									echo "<td>".$_html['skip']."</td>";
									echo "<td>".$_html['count']."</td>";
									echo "<td>".$_html['rate']."</td>";
									echo "</tr>";
								}
								echo '</table>';
								echo "</div>";
								echo '<form method="post" action="admin.php">';
									echo '<input type="hidden" name="action" value="reset-grade" />';
									echo '<input type="submit" value="重置所有考试状态" class="btn btn-danger" />&nbsp;&nbsp;<small>执行后不可恢复，请谨慎操作</small>';
								echo '</form>';
							}else{
								echo "<div class='margin-top-20px'>共有".$_competed_num."人已经参加了考试 >></div>";
							}	
						?>
					</div>
					<div class="clear"></div>
				</div><!--#content-panel-->
			</div>
			<? include 'includes/footer.inc.php'; ?>
		</div>
	</body>
</html>