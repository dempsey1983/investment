<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class HomePage extends Page 
	{
		
	}
	$homepage = new HomePage();
	$homepage->Display();
?>