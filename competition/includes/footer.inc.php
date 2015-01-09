<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-18
*/
?>
<div class="clear"></div>
<footer>
	<div class="hidden" id="copy-info">
		<p>Copy 2014 sealiu. All rights reserved</p>
		<p>Author: SEALiu</p>
		<p>Email: iliuyang@foxmail.com</p>
	</div>
	<h5><a id="alert-info">&copy;&nbsp;2014&nbsp;sealiu</a></h5>
	<?
	if(!isset($_COOKIE['username'])){
		echo '<a href="backstage.php"><button type="button" class=" btn btn-xs btn-primary ">后台登录</button></a>';
	}
	?>
</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/base.js"></script>