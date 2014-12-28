<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		public function DisplayMain() {
		?>
		<div id="main">
		<div id="main_top">
        <h1>我的人人贷</h1>
        <img src="images/jiantou.png" alt="" /> 
        <p>账户管理</p>
        <img src="images/jiantou.png" alt="" />
        <p>个人基础信息</p>  
        </div>
        <div id="main_left"></div>
        <div id="main_right">
        	<div id="main_right_top">个人基础信息</div>
            <div id="main_right1">
             <img src="images/touxiang.png" alt=""/>
            </div>
            <div id="main_right2">
            		<ul id="person_info">
                        <li>昵称 </li>
                        <li>真实姓名</li>
                        <li>身份证号</li>
                        <li>邮箱</li>
                        <li>性别</li>	                    
                    </ul>
              </div>
        </div>
    	</div>  
		<?php
		/* 
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
		*/
		?>	
		<!--
			<h2>理财树：账户管理</h2>
			<div>
				<div>
				</div>
				<div>
					<p>账户余额</p>
				</div>
				<div>
					<p>账户余额</p>
					<br/>
					<p>冻结金额</p>
				</div>
				<div>
					<input type="submit" value="充值"/>
				</div>
				<div>
					<input type="submit" value="体现"/>
				</div>
			</div>
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
			-->
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