<?PHP
	function __autoload($name){
		include_once "./class/".$name.".inc";
	}
	class inverstPage extends Page 
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
			$query = mysql_query("select * from tb_borrow");
			$num_result = mysql_num_rows($query);
//			echo "<p>Number of rows found: ".$num_result."</p>";
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
             </div>
             </div> 
              <div id="main_middle">
                	<div id="main_middle_left">
                    	<div id="main_middle_left_top">
                        	<div id="main_middle_left_top1">筛选投资项目</div>
                            <div id="main_middle_left_top2">
                            <a>多选</a>
                            </div>
                        </div>
                        <table id="main_middle_bottom">
  							<tr>
   							  <td> 标的类型</td>
                              <td> <input class="ax" type="button" value="不限"></td>
    						  <td> <input class="ax" type="button" value="实地认证标"></td>
                              <td> <input class="ax" type="button" value="信用认证标"></td>
                              <td> <input class="ax" type="button" value="机构担保标"></td>
                              <td> <input class="ax" type="button" value="智能理财标"></td>
  							</tr>
  							<tr>
    						  <td> 借款期限</td>
                              <td> <input class="ax" type="button" value="不限"></td>
    						  <td> <input class="ax" type="button" value="6个月及以下"></td>
                              <td> <input class="ax" type="button" value="7-12个月"></td>
                              <td> <input class="ax" type="button" value="13-24个月"></td>
                              <td> <input class="ax" type="button" value="25个月及以上"></td>
 							</tr>
 							<tr>
   							 <td> 认证等级</td>
                              <td> <input class="ax" type="button" value="不限"></td>
                              <td> <input class="ax" type="button" value="A"></td>
                              <td> <input class="ax" type="button" value="B"></td>
                              <td> <input class="ax" type="button" value="C"></td>
                              <td> <input class="ax" type="button" value="D"></td>
  							</tr>
						</table>                    
                </div>
              </div>
             <div id="main_bottom">
             	<div id="main_bottom_top">
                	<div id="main_bottom_top1">投资列表</div>
                    <div id="main_bottom_top2"><a  href="#" target="_blank">理财计算器</a></div>
                    <div class="main_bottom_top3">
                    	<div class="main_bottom_top3_1">累计成交总金额</div>
                        <div class="main_bottom_top3_2">亿元</div>
                    </div>
                    <div class="main_bottom_top3">
                    	<div class="main_bottom_top3_1">累计成交总金额</div>
                        <div class="main_bottom_top3_2">亿元</div>
                    </div>
                    <div class="main_bottom_top3">
                    	<div class="main_bottom_top3_1">累计成交总金额</div>
                        <div class="main_bottom_top3_2">亿元</div>
                    </div>
                 </div>	
                 <table>
  					<tr bgcolor = "#ccccFF">
  						<td width="40"></td>
    					<td width="140">借款标题</td>
    					<td width="180">信用等级</td>
                        <td width="180">年利率</td>
                        <td width="180">金额</td>
                        <td width="180">期限</td>
                        <td width="180">进度</td>                       
  					</tr>
  					<?php 
  						//echo "<p>Number of rows found: ".$num_result."</p>";
						for($i = 0; $i < $num_result; $i++) {
							$row = mysql_fetch_array($query);
							
							?>
							<tr>
							<td width="40"><?php 
								
								switch($row['type']) {
									case 1:
										echo '信';
										break;
									default:
										echo '实';
										break;
								}
								
								?></td>
							<td width="140"><?php 
								echo '<a href="detailPage.php?loanId='.$row['id'].'">';
								echo $row['title'];
								echo '</a>';
								?></td>
							<td width="180"><?php 
								$str = "select credit_rating from tb_users where id=".$row['id'];
								//echo $str;
								$credit_rating_q = mysql_query($str);
								$credit_rating_r = mysql_fetch_array($credit_rating_q);
								$credit_rating = $credit_rating_r['credit_rating'];
								//echo $credit_rating;
								switch ($credit_rating){
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
								
							?></td>
							<td width="180"><?php echo $row['rate'];?></td>
							<td width="180"><?php echo $row['amount'];?></td>
							<td width="180"><?php echo $row['term']."个月";?></td>
							<td width="180"><?php echo $row['schedule'];?></td>
							</tr>
							<?php
						}
  					?>
				</table> 
             </div> 
      	</div>
		<?php
		}
	}
	$subpage = new inverstPage();
	$subpage->Display();
?>