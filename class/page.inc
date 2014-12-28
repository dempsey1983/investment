<?PHP
class Page
{
	//Class Page's attributes
	public $content = "<p>你不理财，财不理你</p>";
	public $title = "理财树";
	public $keywords = "Investment for P2P";
	//Class Page's operations
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	public function Display()
	{
		session_start();
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
		$this->DisplayTitle();
		$this->DisplayKeywords();
		$this->DisplayStytles();
	?>	
	</head>
	<body>
	<div style="width:100%;background-color:#f2f2f2;">
	<div id="container">
	<?php
		$this->DisplayHeaderTop();
		$this->DisplayHeader();
		$this->addJavaScript();
		$this->DisplayMain();
		$this->DisplayFooter();
	?>
	</div>
	</div>
	</body>
	</html>
	<?php
	}
	public function DisplayTitle() {
		echo "<title>".$this->title."</title>";
	}
	public function DisplayKeywords() {
		echo "<meta name=\"keywords\" content=\"".$this->keywords."\"/>";
	}
	public function DisplayStytles() {
	?>
	<link rel="stylesheet" type="text/css" href="./css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="./css/info.css" />
	<?PHP
	}
	public function addJavaScript() {
	}
	public function DisplayHeaderTop() {
	?>
	<div id="header_top">
        <div id="header_top1"></div>
        <div id="header_top2"><a href="register.php">快速注册</a></div>
        <div id="header_top3"><a href="login.php">立即登录</a></div>
    </div>
	<?PHP
	}
	public function DisplayHeader() {
	?>
    <div id="header">
    	<img src="images/header_logo.jpg" alt=""/>
      	<ul id="nav">
        	<li><a href="index.php">首页</a></li>
            <li><a href="inverstment.php">我要理财</a></li>
			<li><a href="loan.php">我要借款</a></li>
			<li><a href="help.php">新手指引</a></li>
			<li><a href="about.php">关于我们</a></li>
		</ul>
 	</div>
	<?PHP
	}
	public function DisplayMain() {
	?><!--  -->
	<?PHP
	}
	public function DisplayFooter() {
	?>
	<div id="footer">
		<HR style="border:1 dashed #987cb9" width="100%" color=#987cb9 SIZE=1></HR>
		<div id="footer_top">
			<div id="foot_left">
				<div id="foot_left_logo">
				<img src="images/logo.jpg" alt=""/>
				</div>
				<div id="foot_left_p">
				<p>
					理财树成立于2015年1月，是国内第一家由工商部门特批获得“金融信息服务”资质，从而得到政府认可的平台。理财致力于搭建一个安全、高效、诚信、透明的互联网金融平台，规范个人借贷行为，改善借款人状态，同时拓宽借出者投资渠道。
				</p>
				</div>
			</div>
			<div id="foot_right">
				<h1>关于理财树</h1>
				<br/>
				<ul>
				<li>理财树团队</li>
				<li>媒体报道</li>
				<li>招贤纳士</li>
				<li>联系我们</li>
				</ul>
			</div>
			<div id="foot_right">
				<h1>业务信息</h1>
				<br/>
				<ul>
				<li>我要借款</li>
				<li>我要理财</li>
				</ul>
			</div>
			<div id="foot_right">
				<h1>诚信保障</h1>
				<br/>
				<ul>
				<li>法律政策</li>
				<li>本金保障</li>
				<li>工作原理</li>
				<li>资费说明</li>
				</ul>
			</div>
			<div id="foot_right">
				<h1>客户服务</h1>
				<br/>
				<ul>
				<li>新浪微博</li>
				<li>腾讯微博</li>
				<li>微信</li>
				<li>400-1855-955</li>
				</ul>
			</div>
		</div> 
		<HR style="border:1 dashed #987cb9" width="100%" color=#987cb9 SIZE=1></HR>
		<div id="footer_bottom">
	        <p>Copyright Reserved 2007-2014©理财树（www.licaishu.com）&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;京ICP备01010001号&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;北京理财树投资股份有限公司</p>  
    	</div>
	</div>
	<?PHP
	}
}
?>