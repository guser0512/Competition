<?php
/**
*====================================================
*Copyright 2014 sealiu
*Author:SEALiu
*Date:2014-2-18
*/

define("TITLE", '在线考试系统--个人中心');
require dirname(__FILE__).'/includes/common.inc.php';
if(!isset($_COOKIE['username'])){
	_location('请先登录！','login.php');
}
if($_COOKIE['level']!=0){
	_location('你没有权限访问此页面！','login.php');
}
$_competition_time=_fetch_array("SELECT value FROM tg_systerm_c WHERE name='competition_time'");
$_rows=_fetch_array("SELECT * FROM tg_user WHERE username='{$_COOKIE['username']}'");
$_user_grade=_fetch_array("SELECT is_competed FROM tg_user WHERE username='{$_COOKIE['username']}'");
$_record_count=_num_rows(_query("SELECT * FROM `{$_COOKIE['uniqid']}`"));
if($_POST['action']=='alert-user-pass'){
	include ROOT_PATH.'includes/login.func.php';
	$_pass=array();
	$_pass['old_pass']=_mysql_string(sha1($_POST['old_pass']));
	$_pass['new_pass']=_check_password($_POST['new_pass'],6,20);
	$_pass['repeat_pass']=_check_pass_same($_POST['new_pass'],$_POST['repeat_pass']);
	if(!!$_check=_fetch_array("SELECT * FROM tg_user WHERE username='{$_COOKIE['username']}' AND password='{$_pass['old_pass']}' LIMIT 1")){
		_query("UPDATE tg_user SET password='{$_pass['repeat_pass']}' WHERE username='{$_COOKIE['username']}'");
	}else{
		_location("当前密码不正确，请重试！","user.php");
	}
	if(mysql_affected_rows()==1){
		_sql_close();
		_cookie_destroy('username','uniqi','level',null);
		_location("修改成功，请重新登录！","logout.php");
	}else{
		_sql_close();
		_location("修改失败，请重试！","user.php");
	}
}
$_question_xz=_query("SELECT * FROM tg_question_xz");
$_question_pd=_query("SELECT * FROM tg_question_pd");
$_question_xz_num=_num_rows($_question_xz);
$_question_pd_num=_num_rows($_question_pd);
$_question_type=rand(0,1);
if($_question_type==0){
	$_rand_question_id=rand(1,$_question_xz_num);
}else{
	$_rand_question_id=rand(1,$_question_pd_num);
}

if($_POST['action']=='start-competition-button'){
	_query("TRUNCATE TABLE `{$_COOKIE['uniqid']}`");
	_location("一场考试的时间为：".$_competition_time['value']."分钟。请把握好时间！点击确定，开始考试。","compete.php?type=".$_question_type."&id=".$_rand_question_id."");
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
							<li class="active"><a href="#start-competition" data-toggle="tab">开始考试</a></li>
							<li><a href="#alert-pass" data-toggle="tab">修改登录密码</a></li>
							<li><a href="#check-grade" data-toggle="tab">详细记录&amp;成绩</a></li>
						</ul>
					</nav>
				</div>
				<div id="content-panel" class="tab-content">
					<div class="tab-pane fade in active" id="start-competition">
						<h4><strong>请阅读考试须知</strong></h4>
						<p>1.遵守考试纪律，服从监考人员指挥。</p>
						<p>2.不准使用手机登通讯设备和U盘等存储设备。</p>
						<p>3.未经工作人员允许，不得随意进出考场。</p>
						<p>4.考试中禁止大声喧哗，随意走动。</p>
						<p>5.考试中认真答题，自行完成，不准讨论。</p>
						<p>6.请爱护公物及考试设备。</p>
						<?
						echo '<form method="post" action="user.php" class="margin-top-20px">';
							echo '<input type="hidden" name="action" value="start-competition-button" />';
									if($_user_grade['is_competed']!=1){
									echo '<p><input type="submit" value="知道了，开始考试" class="btn btn-primary" />&nbsp;&nbsp;<small>此操作会清除之前的错题记录，且不可恢复　</small></p>';
									}else{
									echo '<p class="btn btn-primary disabled">你已经参加过考试，请等下一轮</p>';
									}
						echo '</form>';
						?>
					</div>
					<div class="tab-pane fade" id="alert-pass">
						<form method="post" action="user.php" class="form-horizontal margin-top-20px" role="form">
						  <input type="hidden" name="action" value="alert-user-pass" />
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
					<div class="tab-pane fade" id="check-grade">
						<?php 
							if($_record_count!=0){
								$_xz_correct_id=_query("SELECT question_id FROM `{$_COOKIE['uniqid']}`WHERE xz=1");
								$_pd_correct_id=_query("SELECT question_id FROM `{$_COOKIE['uniqid']}`WHERE pd=1");
								$_xz_wrong_id=_query("SELECT question_id FROM `{$_COOKIE['uniqid']}`WHERE xz=2");
								$_pd_wrong_id=_query("SELECT question_id FROM `{$_COOKIE['uniqid']}`WHERE pd=2");
								$_xz_skip_id=_query("SELECT question_id FROM `{$_COOKIE['uniqid']}`WHERE xz=3");
								$_pd_skip_id=_query("SELECT question_id FROM `{$_COOKIE['uniqid']}`WHERE pd=3");
								$_correct_num=_num_rows($_xz_correct_id)+_num_rows($_pd_correct_id);
								$_wrong_num=_num_rows($_xz_wrong_id)+_num_rows($_pd_wrong_id);
								$_skip_num=_num_rows($_xz_skip_id)+_num_rows($_pd_skip_id);
								$_grade=2*$_correct_num-$_wrong_num;
								_query("UPDATE tg_user SET grade=$_grade,correct=$_correct_num,wrong=$_wrong_num,skip=$_skip_num WHERE username='{$_COOKIE['username']}'");
								echo "<h4><a class='nephritis-color'><strong>答对的题数为 ".$_correct_num."</strong></a>　";
								echo "<a class='alizarin-color'><strong>答错的题数为 ".$_wrong_num."</strong></a>　";
								echo "<a class='orange-color'><strong>跳过的题数为 ".$_skip_num."</strong></a>　";
								echo "<a class='belize-color'><strong>你的成绩是 ".$_grade." 分。</strong></a></h4>";
								echo "<div class='alert alert-gray alert-dismissable margin-top-20px'>";
								echo  "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
								echo "<p><strong>你可以使用 Ctrl+P 打印页面（PDF格式）。</strong></p>";
								echo "<p>打印选项：</p><p><small>'目标' 更改为 '另存为PDF'。</small></p><p><small>'边距' 选择 '无'。</small></p>";
								echo "</div>";
								if(_num_rows($_xz_correct_id)!=0){
									echo "<div class='panel panel-success full-width'>";
									echo "<div class='panel-heading'>做对的选择题（共"._num_rows($_xz_correct_id)."道）</div>";
									echo '<table class="table table-bordered table-hover table-condensed">';
									echo 	'<tr>';
									echo 		'<td>#</td>';
									echo 		'<td>Content</td>';
									echo 		'<td>A</td>';
									echo 		'<td>B</td>';
									echo 		'<td>C</td>';
									echo 		'<td>D</td>';
									echo 		'<td>Answer</td>';
									echo 	'</tr>';

												while(!!$_xz_correct_id_list=_fetch_array_list($_xz_correct_id)){
													$_html=array();
													$_html['question_id']=$_xz_correct_id_list['question_id'];
													$_xz_correct_content=_fetch_array("SELECT * FROM tg_question_xz WHERE id='{$_html['question_id']}' LIMIT 1");
													$_html['content']=$_xz_correct_content['content'];
													switch($_xz_correct_content['answer']){
														case 1:
														$_html['answer']='A';
														break;
														case 2:
														$_html['answer']='B';
														break;
														case 3:
														$_html['answer']='C';
														break;
														case 4:
														$_html['answer']='D';
														break;
													}
													$_html=_html($_html);
													echo "<tr>";
													echo "<td>".$_html['question_id']."</td>";
													echo "<td>".$_html['content']."</td>";
													echo "<td>".$_xz_correct_content['mark_a']."</td>";
													echo "<td>".$_xz_correct_content['mark_b']."</td>";
													echo "<td>".$_xz_correct_content['mark_c']."</td>";
													echo "<td>".$_xz_correct_content['mark_d']."</td>";
													echo "<td>".$_html['answer']."</td>";
													echo "</tr>";
												}
									echo '</table>';
									echo '</div>';
								}
								if(_num_rows($_pd_correct_id)!=0){
									echo "<div class='panel panel-success'>";
									echo "<div class='panel-heading'>做对的判断题（共"._num_rows($_pd_correct_id)."道）</div>";
									echo '<table class="table table-bordered table-hover table-condensed">';
									echo 	'<tr>';
									echo 		'<td>#</td>';
									echo 		'<td>Content</td>';
									echo 		'<td>Answer</td>';
									echo 	'</tr>';

												while(!!$_pd_correct_id_list=_fetch_array_list($_pd_correct_id)){
													$_html=array();
													$_html['question_id']=$_pd_correct_id_list['question_id'];
													$_pd_correct_content=_fetch_array("SELECT * FROM tg_question_pd WHERE id='{$_html['question_id']}' LIMIT 1");
													$_html['content']=$_pd_correct_content['content'];
													switch($_pd_correct_content['answer']){
														case 0:
														$_html['answer']=错误;
														break;
														case 1:
														$_html['answer']=正确;
														break;
													}
													$_html=_html($_html);
													echo "<tr>";
													echo "<td>".$_html['question_id']."</td>";
													echo "<td>".$_html['content']."</td>";
													echo "<td>".$_html['answer']."</td>";
													echo "</tr>";
												}
									echo '</table>';
									echo '</div>';
								}
								if(_num_rows($_xz_wrong_id)!=0){
									echo "<div class='panel panel-danger'>";
									echo "<div class='panel-heading'>做错的选择题（共"._num_rows($_xz_wrong_id)."道）</div>";
									echo '<table class="table table-bordered table-hover table-condensed">';
									echo 	'<tr>';
									echo 		'<td>#</td>';
									echo 		'<td>Content</td>';
									echo 		'<td>A</td>';
									echo 		'<td>B</td>';
									echo 		'<td>C</td>';
									echo 		'<td>D</td>';
									echo 		'<td>Answer</td>';
									echo 	'</tr>';

												while(!!$_xz_wrong_id_list=_fetch_array_list($_xz_wrong_id)){
													$_html=array();
													$_html['question_id']=$_xz_wrong_id_list['question_id'];
													$_xz_wrong_content=_fetch_array("SELECT * FROM tg_question_xz WHERE id='{$_html['question_id']}' LIMIT 1");
													$_html['content']=$_xz_wrong_content['content'];
													switch($_xz_wrong_content['answer']){
														case 1:
														$_html['answer']='A';
														break;
														case 2:
														$_html['answer']='B';
														break;
														case 3:
														$_html['answer']='C';
														break;
														case 4:
														$_html['answer']='D';
														break;
													}
													$_html=_html($_html);
													echo "<tr>";
													echo "<td>".$_html['question_id']."</td>";
													echo "<td>".$_html['content']."</td>";
													echo "<td>".$_xz_wrong_content['mark_a']."</td>";
													echo "<td>".$_xz_wrong_content['mark_b']."</td>";
													echo "<td>".$_xz_wrong_content['mark_c']."</td>";
													echo "<td>".$_xz_wrong_content['mark_d']."</td>";
													echo "<td>".$_html['answer']."</td>";
													echo "</tr>";
												}
									echo '</table>';
									echo '</div>';
								}
								if(_num_rows($_pd_wrong_id)!=0){
									echo "<div class='panel panel-danger'>";
									echo "<div class='panel-heading'>做错的判断题（共"._num_rows($_pd_wrong_id)."道）</div>";
									echo '<table class="table table-bordered table-hover table-condensed">';
									echo 	'<tr>';
									echo 		'<td>#</td>';
									echo 		'<td>Content</td>';
									echo 		'<td>Answer</td>';
									echo 	'</tr>';

												while(!!$_pd_wrong_id_list=_fetch_array_list($_pd_wrong_id)){
													$_html=array();
													$_html['question_id']=$_pd_wrong_id_list['question_id'];
													$_pd_wrong_content=_fetch_array("SELECT * FROM tg_question_pd WHERE id='{$_html['question_id']}' LIMIT 1");
													$_html['content']=$_pd_wrong_content['content'];
													switch($_pd_wrong_content['answer']){
														case 0:
														$_html['answer']=错误;
														break;
														case 1:
														$_html['answer']=正确;
														break;
													}
													$_html=_html($_html);
													echo "<tr>";
													echo "<td>".$_html['question_id']."</td>";
													echo "<td>".$_html['content']."</td>";
													echo "<td>".$_html['answer']."</td>";
													echo "</tr>";
												}
									echo '</table>';
									echo '</div>';
								}
								if(_num_rows($_xz_skip_id)!=0){
									echo "<div class='panel panel-warning'>";
									echo "<div class='panel-heading'>跳过的选择题（共"._num_rows($_xz_skip_id)."道）</div>";
									echo '<table class="table table-bordered table-hover table-condensed">';
									echo 	'<tr>';
									echo 		'<td>#</td>';
									echo 		'<td>Content</td>';
									echo 		'<td>A</td>';
									echo 		'<td>B</td>';
									echo 		'<td>C</td>';
									echo 		'<td>D</td>';
									echo 		'<td>Answer</td>';
									echo 	'</tr>';

												while(!!$_xz_skip_id_list=_fetch_array_list($_xz_skip_id)){
													$_html=array();
													$_html['question_id']=$_xz_skip_id_list['question_id'];
													$_xz_skip_content=_fetch_array("SELECT * FROM tg_question_xz WHERE id='{$_html['question_id']}' LIMIT 1");
													$_html['content']=$_xz_skip_content['content'];
													switch($_xz_skip_content['answer']){
														case 1:
														$_html['answer']='A';
														break;
														case 2:
														$_html['answer']='B';
														break;
														case 3:
														$_html['answer']='C';
														break;
														case 4:
														$_html['answer']='D';
														break;
													}
													$_html=_html($_html);
													echo "<tr>";
													echo "<td>".$_html['question_id']."</td>";
													echo "<td>".$_html['content']."</td>";
													echo "<td>".$_xz_skip_content['mark_a']."</td>";
													echo "<td>".$_xz_skip_content['mark_b']."</td>";
													echo "<td>".$_xz_skip_content['mark_c']."</td>";
													echo "<td>".$_xz_skip_content['mark_d']."</td>";
													echo "<td>".$_html['answer']."</td>";
													echo "</tr>";
												}
									echo '</table>';
									echo '</div>';
								}


								if(_num_rows($_pd_skip_id)!=0){
									echo "<div class='panel panel-warning'>";
									echo "<div class='panel-heading'>跳过的判断题（共"._num_rows($_pd_skip_id)."道）</div>";
									echo '<table class="table table-bordered table-hover table-condensed">';
									echo 	'<tr>';
									echo 		'<td>#</td>';
									echo 		'<td>Content</td>';
									echo 		'<td>Answer</td>';
									echo 	'</tr>';

												while(!!$_pd_skip_id_list=_fetch_array_list($_pd_skip_id)){
													$_html=array();
													$_html['question_id']=$_pd_skip_id_list['question_id'];
													$_pd_skip_content=_fetch_array("SELECT * FROM tg_question_pd WHERE id='{$_html['question_id']}' LIMIT 1");
													$_html['content']=$_pd_skip_content['content'];
													switch($_pd_skip_content['answer']){
														case 0:
														$_html['answer']=错误;
														break;
														case 1:
														$_html['answer']=正确;
														break;
													}
													$_html=_html($_html);
													echo "<tr>";
													echo "<td>".$_html['question_id']."</td>";
													echo "<td>".$_html['content']."</td>";
													echo "<td>".$_html['answer']."</td>";
													echo "</tr>";
												}
									echo '</table>';
									echo '</div>';
								}
							}else{
								echo "<h4>你还没有参加过考试！所以暂时没有成绩。</h4>";
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<? include 'includes/footer.inc.php'; ?>
		</div>
	</body>
</html>