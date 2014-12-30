<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		public $valid_code = "1234";
		public function update_sql() {
			include_once("./sql/connect.php");
			
			$email = trim($_POST['email']);
			$password = md5(trim($_POST['Password01']));
			//检测用户名是否存在
			$query = mysql_query("select email from tb_registers where email='$email'");
			$num = mysql_num_rows($query);
			if($num != 0){
				echo '<script>alert("邮箱已存在，请换个其他的邮箱");window.history.go(-1);</script>';
				exit;
			}
			
			
			$token = md5($username.$password.$regtime); //创建用于激活识别码
			$token_exptime = time()+60*60*24;//过期时间为24小时后
			
			$sql = "insert into `tb_registers` (`username`,`password`,`email`,`token`,`token_exptime`,`regtime`) values ('$username','$password','$email','$token','$token_exptime','$regtime')";
			
			mysql_query($sql);
			if(mysql_insert_id()){
				echo '<p>注册成功</p>';
			}
		}
		public function send_code() {
			include_once("./class/smtp.class.php");
			$email = $_POST['email'];
			$smtpserver = "smtp.163.com"; 	//SMTP服务器
		    $smtpserverport = 25; 			//SMTP服务器端口
		    $smtpusermail = "php_server@163.com"; //SMTP服务器的用户邮箱
		    $smtpuser = "php_server"; 		//SMTP服务器的用户帐号
		    $smtppass = "php#123456"; 		//SMTP服务器的用户密码
		    
		    //这里面的一个true是表示使用身份验证,否则不使用身份验证.
		    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); 
		    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
		    $smtpemailto = $email;
		    $smtpemailfrom = $smtpusermail;
		    $emailsubject = "valid code";
		    $emailbody = "亲爱的 ".$email."：<br/>
		    				感谢您在\"理财树\"注册了新帐号。<br/>
		    				验证码：".$this->valid_code."<br/>
		    				如果操作你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- www.njtu.edu.cn 敬上</p>";
		    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
			if($rs==1){
				$msg = '请登录到您的邮箱及时获取验证码！';	
			}else{
				$msg = $rs;	
			}
			echo $msg;
		}
		public function addJavaScript() {
		}
		public function DisplayMain() {
		?>
		<div id="main">
            <form action="register.php" method="post" id="emailreg">
                <div id="relatedLoginBox">
                    <ul id="login_nav">
                        <li>
                        <?php 
                        	$email = $_POST['email'];
                        	echo '<em>邮箱：</em>';
                            echo '<input type="text" tabindex="1" name="email" id="email" value="'.$email.'" size="40" />';
                        	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            	echo '<span class="Exp"></span>';
                            	$this->send_code();
                        	} else {
                            	echo '<span style="color:red">请输入有效邮箱</span>';
                        	}
                        ?>
                        </li>
                        <li id="validatecode" class="clearfix" style="padding-left: 33px;">
                        <?php 
                        	$emailvalidatecode = $_POST['emailvalidatecode'];
                        	
                        	echo '<input type="text" name="emailvalidatecode" id="emailmbyzm" size="27" maxlength="6" value="'.$emailvalidatecode.'"/>';
                        	echo '<input type="button" class="fsyzm" id="getvefydata_email" value="发送验证码"  onclick="this.form.submit()"/>';
                        	if ($emailvalidatecode != $this->valid_code) {
                        		echo '<span style="color:red">验证码错误</span>';
                        		//echo $emailvalidatecode;
                        		//echo $this->valid_code;
                        	}
                        ?>  
                        </li>
                        <li class="clearfix">
                            <em>密码：</em>
                            <?php 
                            	$Password01 = $_POST['Password01'];
                            	echo '<input type="password" name="Password01" id="Password01" size="40" value="'.$Password01.'"/>';
                            	if ($Password01=="") {
                            		echo '<span class="Exp">请输入有效密码</span>';
                            	}
                            ?>
                            <span class="Exp"></span>
                        </li>
                        <li class="clearfix">
                            <em>确认：</em>              
                            <?php 
                            	$Password02 = $_POST['Password02'];
                            	echo '<input type="password" name="Password02" id="Password02" size="40" value="'.$Password02.'"/>';
                            	if ($Password01 !="" && $Password02 =="") {
                            		echo '<span class="Exp">请确认您的密码</span>';
                            	} else if (($Password01 !="") && ($Password02 !="") && ($Password01 != $Password02)) {
                            		echo '<span class="Exp">两次输入不一致</span>';
                            	} else if (($Password01 !="") && ($Password02 !="") && ($Password01 == $Password02)) {
                            		$this->update_sql();
                            	}
                            ?>
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
                            <input type="button" id="emailregbtn" class="lgn" value="注 册" onclick="this.form.submit()"/>
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