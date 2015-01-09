<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-17
*/
?>
<div id="header">
	<div class="header-info">
		<img src="images/logo.png" />
		<h3>在线考试系统</h3>
	</div>
</div>
<nav id="navigation">
	<ul>
		<?php
			if(isset($_COOKIE['username'])){
				if(FLAG=='compete'){
					echo '<li class="nav-active"><a>考生：'.$_COOKIE['username'].'</a></li>';
					echo '<li><a>考试编号：'.$_COOKIE['uniqid'].'</a></li>';
				}else{
					switch($_COOKIE['level']){
						case 1:
							echo '<li class="nav-active"><a href="admin.php">欢迎管理员 '.$_COOKIE['username'].'</a></li>';
							break;
						default:
							echo '<li class="nav-active"><a href="user.php">'.$_COOKIE['username'].'</a></li>';
					}
					echo '<li><a href="logout.php">安全登出</a></li>';
				}
			}else{
				if(NAV=='home'){
					echo '<li class="nav-active"><a href="index.php">首页</a></li>';
					echo '<li><a href="register.php">注册</a></li>';
				}else if(NAV=='reg'){
					echo '<li><a href="index.php">首页</a></li>';
					echo '<li class="nav-active"><a href="register.php">注册</a></li>';
				}else{
					echo '<li><a href="index.php">首页</a></li>';
					echo '<li><a href="register.php">注册</a></li>';
				}
			}
		?>
	</ul>
</nav>