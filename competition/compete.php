<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-18
*/
ob_start();
session_start();
define("TITLE", '在线考试系统--开始考试');
define("FLAG",'compete');
require dirname(__FILE__).'/includes/common.inc.php';
$_is_competed=_fetch_array("SELECT is_competed FROM tg_user WHERE username='{$_COOKIE['username']}'");
$_competition_time=_fetch_array("SELECT value FROM tg_systerm_c WHERE name='competition_time'");
if($_is_competed['is_competed']!=0){
	_location("你已经参加过比赛，请不要重复参加！","user.php");
}
if(!isset($_COOKIE["level"])){
_location("你需要先登录！","login.php");
}else if($_COOKIE['level']==1){
_location("管理员账户不能参加考试！","logout.php");
}
$_target_time=time()+$_competition_time['value']*60;
if($_COOKIE['target']==""){setcookie('target',$_target_time);}
$_now_time=time();
if($_COOKIE['target']==""){
	$_remain_time=$_target_time-$_now_time;
}else{
	$_remain_time=$_COOKIE['target']-$_now_time;
}
if($_remain_time<=0){
	_query("UPDATE tg_user SET is_competed=1 WHERE username='{$_COOKIE['username']}'");
	if(mysql_affected_rows()==1){
		_sql_close();
		setcookie('target',FALSE,time()-1);
		setcookie('question_xz_record_cookie',FALSE,time()-1);
		setcookie('question_pd_record_cookie',FALSE,time()-1);
		_location("考试结束！请查看成绩","user.php");
	}
}
$_question_xz=_query("SELECT * FROM tg_question_xz");
$_question_pd=_query("SELECT * FROM tg_question_pd");
$_question_xz_num=_num_rows($_question_xz);
$_question_pd_num=_num_rows($_question_pd);
if(isset($_GET['id'])&&isset($_GET['type'])){
	$_question_id=intval($_GET['id'],10);
	$_question_type=intval($_GET['type'],10);
	switch($_question_type){
		case 0:
		$_question_next_type=1;
		if(isset($_COOKIE['question_xz_record_cookie'])){
			$_question_xz_record_str=$_COOKIE['question_xz_record_cookie'];
			setcookie('question_xz_record_cookie',FALSE,time()-1);
			$_question_xz_record=unserialize($_question_xz_record_str);
		}else{
			$_question_xz_record=array();
		}
		$_question_xz_record[]=$_question_id;
		$_question_xz_record=array_unique($_question_xz_record);
		$_question_xz_record_str=serialize($_question_xz_record);
		setcookie("question_xz_record_cookie",$_question_xz_record_str);
		break;

		case 1:
		$_question_next_type=0;
		if(isset($_COOKIE['question_pd_record_cookie'])){
			$_question_pd_record_str=$_COOKIE['question_pd_record_cookie'];
			setcookie('question_pd_record_cookie',FALSE,time()-1);
			$_question_pd_record=unserialize($_question_pd_record_str);
		}else{
			$_question_pd_record=array();
		} 
		$_question_pd_record[]=$_question_id;
		$_question_pd_record=array_unique($_question_pd_record);
		$_question_pd_record_str=serialize($_question_pd_record);
		setcookie("question_pd_record_cookie",$_question_pd_record_str);
		break;
	}

	switch($_question_next_type){
		case 0:
		$_count_xz=count($_question_xz_record);
		do{
			$_question_next_id=rand(1,$_question_xz_num);
			for ($i=0;$i<$_count_xz;$i++){ 
				if($_question_xz_record[$i]==$_question_next_id){
					$_repeat=1;
				}else{
					$_repeat=0;
				}
			}
		}while($_repeat);
		break;

		case 1:
		$_count_pd=count($_question_pd_record);
		do{
			$_question_next_id=rand(1,$_question_pd_num);
			for ($i=0;$i<$_count_pd;$i++){ 
				if($_question_pd_record[$i]==$_question_next_id){
					$_repeat=1;
				}else{
					$_repeat=0;
				}
			}
		}while($_repeat);
		break;
	}
}else{
	_alert_back('脚本错误!','user.php');
}

switch($_question_type){
	case 0:
		$_question_line=_fetch_array("SELECT * FROM tg_question_xz WHERE id=$_question_id LIMIT 1");
		break;
	case 1:
		$_question_line=_fetch_array("SELECT * FROM tg_question_pd WHERE id=$_question_id LIMIT 1");
		break;
}
if($_POST['action']=='question'){
	$_answer=$_POST['mark'];
	if($_answer==$_question_line['answer']){
		switch($_question_type){
			case 0:
			_query("INSERT INTO `{$_COOKIE['uniqid']}`(question_id,xz,pd) VALUES($_question_id,1,0)");
			break;
			case 1:
			_query("INSERT INTO `{$_COOKIE['uniqid']}`(question_id,xz,pd) VALUES($_question_id,0,1)");
			break;
		}
	}else{
		switch($_question_type){
			case 0:
			_query("INSERT INTO `{$_COOKIE['uniqid']}`(question_id,xz,pd) VALUES($_question_id,2,0)");
			break;
			case 1:
			_query("INSERT INTO `{$_COOKIE['uniqid']}`(question_id,xz,pd) VALUES($_question_id,0,2)");
			break;
		}
	}
	_location(NULL,'compete.php?type='.$_question_next_type.'&id='.$_question_next_id.'');
}
if($_POST['action']=='skip'){
	switch($_question_type){
		case 0:
		_query("INSERT INTO `{$_COOKIE['uniqid']}`(question_id,xz,pd) VALUES($_question_id,3,0)");
		break;
		case 1:
		_query("INSERT INTO `{$_COOKIE['uniqid']}`(question_id,xz,pd) VALUES($_question_id,0,3)");
		break;
	}
	_location(NULL,'compete.php?type='.$_question_next_type.'&id='.$_question_next_id.'');
}
?>
<!DOCTYPE html>
<html>
	<head><? include 'includes/title.inc.php'; ?></head>
	<body>
		<div id="wrapper">
			<? include 'includes/header.inc.php' ?>
			<div id="compete-content">
				<?
					echo '<div id="question-panel">';
					if($_question_type==0){
						echo '<div id="question-id">选择：'.$_question_id.'</div>';
						echo '<div id="question-content">'.$_question_line['content'].'</div>';
							echo '<div id="question-mark">';
								echo '<p>A：'.$_question_line['mark_a'].'</p>';
								echo '<p>B：'.$_question_line['mark_b'].'</p>';
								echo '<p>C：'.$_question_line['mark_c'].'</p>';
								echo '<p>D：'.$_question_line['mark_d'].'</p>';
							echo '</div><!--#question-mark-->';
						echo '<div id="question-select">';
						echo '<form method="post" action="compete.php?type='.$_question_type.'&id='.$_question_id.'"  id="next-form">';
							echo '<input type="hidden" name="action" value="question" />';
							echo '<label><input type="radio" name="mark" value="1" class="radio-dot" /><span>&nbsp;&nbsp;A</span></label>';
							echo '<label><input type="radio" name="mark" value="2" class="radio-dot" /><span>&nbsp;&nbsp;B</span></label>';
							echo '<label><input type="radio" name="mark" value="3" class="radio-dot" /><span>&nbsp;&nbsp;C</span></label>';
							echo '<label><input type="radio" name="mark" value="4" class="radio-dot" /><span>&nbsp;&nbsp;D</span></label>';
							if($_remain_time>0){
								echo '<input type="submit" value="下一题" class="btn btn-primary next-question" />';
								echo '</form>';
								echo '<form method="post" action="compete.php?type='.$_question_type.'&id='.$_question_id.'"  id="skip-form">';
									echo '<input type="hidden" name="action" value="skip" />';
									echo '<input type="submit" value="跳过" class="btn btn-primary skip-question" />';
								echo '</form>';
							}else{
								echo '<button class="btn btn-primary disabled">时间用完，开始收卷</button>';
								echo '<form>';
							}
						echo '</div><!--#question-select-->';
					}else{
						echo '<div id="question-id">判断：'.$_question_id.'</div>';
						echo '<div id="question-content">'.$_question_line['content'].'</div>';
						echo '<div id="question-mark">';
						echo '<p>A：正确</p>';
						echo '<p>B：错误</p>';
						echo '</div>';
						echo '<div id="question-select">';
						echo '<form method="post" action="compete.php?type='.$_question_type.'&id='.$_question_id.'" id="next-form">';
							echo '<input type="hidden" name="action" value="question" />';
							echo '<label><input type="radio" name="mark" value="1" class="radio-dot" /><span>&nbsp;&nbsp;A</span></label>';
							echo '<label><input type="radio" name="mark" value="0" class="radio-dot" /><span>&nbsp;&nbsp;B</span></label>';
							if($_remain_time>0){
								echo '<input type="submit" value="下一题" class="btn btn-primary next-question" />';
								echo '</form>';
								echo '<form method="post" action="compete.php?type='.$_question_type.'&id='.$_question_id.'" id="skip-form">';
									echo '<input type="hidden" name="action" value="skip" />';
									echo '<input type="submit" value="跳过" class="btn btn-primary skip-question" />';
								echo '</form>';
							}else{
								echo '<button class="btn btn-primary disabled">时间用完，开始收卷</button>';
								echo '</form>';
							}
							echo '</div><!--#question-select-->';
					}
					echo '</div>';
					echo '<div class="clear"></div>';
				?>
			</div>
			<div class="clear"></div>
			<? include 'includes/footer.inc.php'; ?>
		</div>
	</body>
</html>
<?php ob_end_flush(); ?>