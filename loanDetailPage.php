<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class loanPage extends Page 
	{
		public function DisplayStytles() {
		?>
		<link rel="stylesheet" type="text/css" href="./css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="./css/info.css"/>
		<link rel="stylesheet" type="text/css" href="./css/sanbiao.css" />
		<?PHP
		}
		public function DisplayMain() {
			include_once("./sql/connect.php");
			$loanId = $_GET['loanId'];
			if ($loanId == null) {
				die(0);
			}
			//echo "<p>loanId ".$loanId."</p>";
			$str = "select * from tb_users where id=".$loanId;
			$query = mysql_query($str);
			//$num_result = mysql_num_rows($query);
			//echo "<p>Number of rows found: ".$num_result."</p>";
			$row = mysql_fetch_array($query);
/*		
			for($i = 0; $i < $num_result; $i++) {
				$row = mysql_fetch_array($query);
				echo "<p><strong>".($i+1).". Title: ";
				echo htmlspecialchars(stripslashes($row['amount']));
				echo "</strong></p>";
			}
*/
		?>
		<div id="main">
        	<div id="main_top">
            	<div id="main_top1">
                 <h1>我要理财</h1>
        		<img src="images/jiantou.png" alt="" /> 
        		<h2>散标投资列表</h2>
        		<img src="images/jiantou.png" alt="" />
        		<h2>借款详情</h2>
             </div>
             </div> 
              <div id="main_middle">
                	<div id="main_middle_left">
	                	<table id="main_middle_bottom">
	                		<tr>
	                		<?php 
	                			echo $row['name'];
	                		?>
	                		</tr>
	                	</table>                  
                	</div>
                	<div id="main_middle_right">
	                	<table id="main_middle_bottom">
	                		<tr>
	                		<?php 
	                			echo $row['name'];
	                		?>
	                		</tr>
	                		<tr>
	                		<?php 
								switch ($row['credit_rating']){
									case 1:
										echo 'HR';break;
									case 2:
										echo 'E';break;
									case 3:
										echo 'D';break;
									case 4:
										echo 'C';break;
									case 5:
										echo 'B';break;
									case 6:
										echo 'A';break;
									case 7:
										echo 'AA';break;
									case 8:
										echo 'AAA';break;
									default:
										echo 'HR';break;
								}
	                		?>
	                		</tr>
	                		<tr>
	                		<?php 
	                			echo $row['name'];
	                		?>
	                		</tr>
	                	</table>
                	</div>
              </div>
      	</div>
		<?php
		}
	}
	$subpage = new loanPage();
	$subpage->Display();
?>