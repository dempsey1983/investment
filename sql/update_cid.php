<?php
	include_once "check_cid.php";
		
	session_start();
	$name = $_POST['name'];
	$cid = $_POST['cid'];
	
	if (!$name || !$cid) {
		echo '<p>输入不能为空，请重新输入.</p>';
	}
	
	if (isCreditNo($cid)) {
		echo '<p>CID is true</p>';
	} else {
		echo '<p>CID is false</p>';
	}
?>