<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		public $content = "<p>欢迎光临理财树</p>";
		public function DisplayContent() {
			echo $this->content;
		}
	}
	$homepage = new HomePage();
	$homepage->Display();
?>