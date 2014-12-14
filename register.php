<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		public function addJavaScript() {
		?>
		<script type="text/javascript">
			function chk_form(){
				var user = document.getElementById("user");
				if(user.value==""){
					alert("用户名不能为空！");
					return false;
					//user.focus();
				}
				var pass = document.getElementById("pass");
				if(pass.value==""){
					alert("密码不能为空！");
					return false;
					//pass.focus();
				}
				var email = document.getElementById("email");
				if(email.value==""){
					alert("Email不能为空！");
					return false;
					//email.focus();
				}
				var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
				if(!preg.test(email.value)){ 
					alert("Email格式错误！");
					return false;
					//email.focus();
				}
			}
		</script>
		<?php
		}
		public function DisplayContent() {
		?>
		<div id="main">
		<h1 class="top_title">理财树：用户注册</h1>
	   	<h2 class="top_title"><a href="login.php" title="直接登录">已有账号，直接登录</a></h2>
	   	<div class="demo">
	   		<form id="reg" action="register.php" method="post" onsubmit="return chk_form();">
	        	<p>用户名：<input type="text" class="input" name="username" id="user"></p>
	            <p>密 &nbsp; 码：<input type="password" class="input" name="password" id="pass"></p>
	            <p>E-mail：<input type="text" class="input" name="email" id="email"></p>
	            <p><input type="submit" class="btn" value="提交注册"></p>
	        </form>
		</div>
		 <br/><div class="ad_76090"><script src="/js/ad_js/bd_76090.js" type="text/javascript"></script></div><br/>
		</div>
	
		<div id="footer">
		    <p>演示版本，如有商用需求，请联系 <a href="http://www.njtu.edu.cn">北京交通大学：孙建东</a></p>
		</div>
		<p id="stat"><script type="text/javascript" src="/js/tongji.js"></script></p>
		<?php
		}
	}
	$homepage = new HomePage();
	$homepage->Display();
?>