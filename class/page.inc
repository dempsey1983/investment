<?PHP
class Page
{
	//Class Page's attributes
	public $content = "<p>你不理财，财不理你</p>";
	public $title = "理财树";
	public $keywords = "Investment for P2P";
	public $buttons = array(
							"主页"	=>  "index.php",
							"注册"	=>	"register.php",
							"登录" 	=>	"login.php",
							"投资"	=>	"inverstment.php",
							"借贷"	=>	"loan.php",
							"管理"	=>	"management.php",
							);
	//Class Page's operations
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	public function Display()
	{
		echo "<html>\n<head>\n";
		echo '
		<meta charset="utf-8">
		<style type="text/css">
			.demo{width:400px; margin:40px auto 0 auto; min-height:250px;}
			.demo p{line-height:30px; padding:4px}
			.input{width:180px; height:20px; padding:1px; line-height:20px; border:1px solid #999}
			.btn{position: relative;overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:14px;line-height:18px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px; margin-left:48px}
		</style>';
		$this->DisplayTitle();
		$this->DisplayKeywords();
		$this->DisplayStytles();
		$this->addJavaScript();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayMenu($this->buttons);
		$this->DisplayContent();
		$this->DisplayFooter();
		echo "</body>\n</html>\n";
	}
	public function DisplayContent() {
		echo $this->content;
	}
	public function DisplayTitle() {
		//session_start();
		echo "<title>".$this->title."</title>";
	}
	public function DisplayKeywords() {
		echo "<meta name=\"keywords\" content=\"".$this->keywords."\"/>";
	}
	public function DisplayStytles() {
	?>
		<style>
		h1 {
			color:black; font-size:24pt; text-align:center;
			font-family:arial, sans-serif
		}
		.menu {
			color:black; font-size:12pt; text-align:center;
			font-family:arial, sans-serif; font-weight:bold
		}
		td {
			background:green
		}
		p {
			color:black; font-size:12pt; text-align:justify;
			font-family:arial, sans-serif
		}
		p.foot {
			color:black; font-size:9pt; text-align:center;
			font-family:arial, sans-serif; font-weight:bold
		}
		a:link,a:visited,a:active {
			color:black
		}
		</style>
	<?PHP
	}
	public function addJavaScript() {
	}
	public function DisplayHeader() {
	?>
		<table width=100% cellpadding="12" cellspacing="0" border="0">
		<tr bgcolor="black">
			<td align="left"><img src="./pic/logo.jpg" /></td>
			<td>
				<h1>理财树</h1>
			</td>
			<td align="right"><img src="./pic/logo.jpg" /></td>
		</tr>
		</table>
	<?PHP
	}
	public function DisplayMenu($buttons) {
		echo "<table width=\"100%\" bgcolor=\"red\" cellpadding=\"4\" cellspacing=\"4\">\n";
		echo "<tr>\n";
		//calculate button size
		$width = 100/count($buttons);
		
		//echo $url;
		while(list($name, $url) = each($buttons)) {
			$this->DisplayButton($width, $name, $url, $this->IsURLCurrentPage($url));
		}
		echo "</tr>\n";
		echo "</table>";
	}
	public function IsURLCurrentPage($url) {
		if(strpos($_SERVER['PHP_SELF'], $url) == false) 
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	public function DisplayButton($width, $name, $url, $active = true) {
		if($active) {
			echo '<td width="'.$width.'%">
					<a href="'.$url.'">
					<img src="./pic/active.jpg" alt="'.$name.'" border="0"/></a>
					<a href="'.$url.'"><span class="menu">'.$name.'</span>
					</a>
					</td>';
		} else {
			echo '<td width="'.$width.'%">
					<a href="'.$url.'">
					<img src="./pic/deactive.jpg" alt="'.$name.'" border="0"/></a>
					<a href="'.$url.'"><span class="menu">'.$name.'</span>
					</a>
					</td>';
		}
	}
	public function DisplayFooter() {
	?>
		<table width="100%" bgcolor="black" cellpadding="12" border="0">
		<tr>
		<td>
			<p class="foot">&copy; 理财树投资有限公司.</p>
			<p class="foot">欢迎访问 <a href = "">www.licaishu.com</a></P>
		</td>
		</tr>
		</table>
	<?PHP
	}
}
?>