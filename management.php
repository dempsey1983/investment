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
			if (isset($_SESSION['valid_user'])) {
				echo '<p>你已经登录，欢迎你 '.$_SESSION['valid_user'].'</p>';
				echo '<a href="logout.php">Log out</a>';
			} else {
				echo '<p>你还没有登录</p>';
				echo '<a href="login.php">前往登录页面</a>';
				die(0);
			}
		?>
			<h2>理财树：账户管理</h2>
			<form action="./sql/update_cid.php" method="post" enctype="multipart/form-data">
			<div>
				<label for="cid">请输入你的姓名</label>
				<br/>
				<input type="text" name="name" size="50" maxLength="32"/>
				<br/>
				<label for="cid">请输入你的身份证号</label>
				<br/>
				<input type="text" name="cid" size="50" maxLength="18"/>
				<br/>
				<input type="submit" value="确定"/>
			</div>
			</form>
			<!--  
			<form action="./sql/upload.php" method="post" enctype="multipart/form-data">
			<div>
				<input type="hidden" name="MAX_FILE_SIZE" value="4194304"/>
				<label for="idFile">请上传你的身份证复印件</label>
				<input type="file" name="idFile" id="idFile"/>
				<br/>
				<input type="submit" value="上传"/>
			</div>
			</form>
			-->
		<?php
		}
	}
	$homepage = new HomePage();
	$homepage->Display();
?>