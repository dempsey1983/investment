<?php 
	session_start();
	if (isset($_POST['email']) && isset($_POST['password'])) {
		//if the user has just tried to log in
		$email = trim($_POST['email']);
		$password = md5(trim($_POST['password']));
		
		include_once("./sql/connect.php");
		$query = mysql_query("select email from tb_registers where email='$email' and password='$password'");
		$num = mysql_num_rows($query);
		if($num == 0){
			echo '<script>alert("用户名/密码错误");window.history.go(-1);</script>';
			exit;
		} else {
			$_SESSION['valid_user'] = $email;
		}
	}
?>
<?php
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		public function DisplayContent() {
		?>
			<h1>理财树：用户登录</h1>
		<?php 
			if (isset($_SESSION['valid_user'])) {
				echo '登录成功 :'.$_SESSION['valid_user'].'<br/>';
				echo '<a href=logout.php>Log out</a><br/>';
			} else {
				if (isset($_POST['email'])) {
					//尝试登录过，但是密码错误；
					echo '邮箱/密码不匹配，请重新输入.<br />';
				} else {
					echo '请输入邮箱/密码.<br />';
				}
				
				//设置登录及验证界面
				echo '<form method="post" action="login.php">';
				echo '<table>';
				echo '<tr><td>邮箱:</td>';
				echo '<td><input type="text" name = "email"></td></tr>';
				echo '<tr><td>密码:</td>';
				echo '<td><input type="password" name = "password"></td></tr>';
				echo '<tr><td colspan="2" align="center">';
				echo '<input type="submit" value="登录"></td></tr>';
				echo '</table></form>';
				
				echo '<form method="post" action="forget_password.php">';
				echo '<table>';
				echo '<tr><td colspan="2" align="center">';
				echo '<input type="submit" value="忘记密码"></td></tr>';
				echo '</table></form>';
			}
		?>
		<?php
		}
	}
	$homepage = new HomePage();
	$homepage->Display();
?>