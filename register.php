<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		public function query() {
			echo 'call query()';
			echo $_POST['email'];
			echo $_POST['password'];
			if (isset($_POST['email']) && isset($_POST['password'])) {
				$email = $_POST['email']; 
			    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
			        echo '<p>This is a valid email.<p>'; 
			    }else{ 
			        echo '<p>This is an invalid email.</p>'; 
			    } 
			} else {
				echo '<p>This is an invalid email 02.</p>'; 
			}
		}
		public function addJavaScript() {
			if($_GET['do']=="yes"){
			   echo '<p>addJavaScript-- register()</p>';	
			   $this->query();
			}
		}
		public function addJavaScript_01() {
		?>  
		<script type="text/javascript">
			function chk_form(){
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
				var pass = document.getElementById("Password");
				if(pass.value==""){
					alert("密码不能为空！");
					return false;
					//pass.focus();
				}
			}
		</script>
		<?php
		}
		public function DisplayMain() {
		?>
		<div id="main">
            <form action="register.php" method="post" id="emailreg">
                <div id="relatedLoginBox">
                    <input type="hidden" name="Redirect" id="Redirect" value="" />
                    <ul id="login_nav">
                        <li id="clearfix">
                            <em>邮箱：</em>
                            <input type="text" tabindex="1" name="email" id="email" placeholder="请填写常用邮箱" />
                            <span class="Exp"></span>
                        </li>
                        <li id="validatecode" class="clearfix" style="padding-left: 35px;">
                            <input type="text" name="emailvalidatecode" id="emailmbyzm" maxlength="6" class="yzmtxt" placeholder="请输入邮箱验证码" />
                            <input type="button" class="fsyzm" id="getvefydata_email" value="发送验证码" />
                            <span class="Exp"></span>
                        </li>
                        <li class="clearfix">
                            <em>密码：</em>
                            <input type="password" name="Password" id="Password" placeholder="请输入8-16位字母或数字" />
                            <span class="Exp"></span>
                        </li>
                        <li class="clearfix">
                            <em>确认：</em>
                            <input type="password" name="Password" id="Password" placeholder="请重复输入上述密码" />
                            <span class="Exp"></span>
                        </li>
                        <li>
                            <p id="checkcorrect" style="height: 30px; line-height: 30px;">
                                <input type="checkbox" id="agreeemail" name="agreeemail" value="0" checked="checked" class="check" />我同意
                                <a href="#" target="_blank">《服务条款》</a>和
                                <a class="policy1" href="#" style="display:initial" target="_blank">《借入协议》</a>
                                <a class="policy2" href="#" style="display:none" target="_blank">《借出协议》</a>
                            </p>
                            <span class="Exp" style="margin-left:74px"></span>
                        </li>
                        <li class="mb0">
                            <input type="button" id="emailregbtn" class="lgn" value="注 册" onclick="javascript:cmdclick()"/>
                            <script type="text/javascript">
							function cmdclick(){
							   document.location.href="?do=yes";
							}
							</script>
                        </li>
                    </ul>
                </div>
            </form>
		</div>
		<?php
		}
	}
	$homepage = new HomePage();
	$homepage->Display();
?>