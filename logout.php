<?php 
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>理财树：用户登出</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<style type="text/css">
		.demo{width:400px; margin:40px auto 0 auto; min-height:250px;}
		.demo p{line-height:30px; padding:4px}
		.input{width:180px; height:20px; padding:1px; line-height:20px; border:1px solid #999}
		.btn{position: relative;overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:14px;line-height:18px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px; margin-left:48px}
	</style>
</head>
<body>
<h1>Member Log out</h1>
<?php 
	if (!empty($old_user)) {
		echo "用户登出成功.<br/>";
	} else {
		echo "You are not logged in. and so have not been logged out.<br/>";
	}
?>
<a href="login.php">Back to main page</a>;
</body>
</html>