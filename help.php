<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class helpPage extends Page 
	{
		public $content = "<p>欢迎光临理财树</p>";
		public function DisplayMain() {
			echo $this->content;
		}
	}
	$subpage = new helpPage();
	$subpage->Display();
?>