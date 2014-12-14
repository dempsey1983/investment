<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		public function DisplayContent() {
		?>
		<?php 
			session_start();
			echo '<h1>理财树：账户管理</h1>';
			if (!isset($_SESSION['valid_user'])) {
				echo '<p>You are not logged in.</p>';
				echo '<a href="logout.php">Log out</a>';
			} else {
				echo '<p>You are logged in as '.$_SESSION['valid_user'].'</p>';
				echo '<a href="login.php">Log in</a>';
			}
		?>
			<h2>理财树：账户管理</h2>
			<form action="upload.php" method="post" enctype="multipart/form-data">
			<div>
				<input type="hidden" name="MAX_FILE_SIZE" value="4194304"/>
				<label for="idFile">请上传你的身份证复印件</label>
				<input type="file" name="idFile" id="idFile"/>
				<br/>
				<input type="submit" value="上传"/>
			</div>
		<?php
		}
	}
	$homepage = new HomePage();
	$homepage->Display();
?>