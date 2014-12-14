<?php
	if ($_FILES['idFile']['error'] > 0) {
		echo 'Problem:';
		switch ($_FILES['idFile']['error']) {
			case 1:
				echo 'File exceeded upload_max_filesize';
				break;
			case 2:
				echo 'File exceeded max_file_size';
				break;
			case 3:
				echo 'File only partially uploaded';
				break;
			case 4:
				echo 'No file uploaded';
				break;
			case 6:
				echo 'Cannot upload file: No temp directory specified';
				break;
			case 7:
				echo 'Upload failed: Cannot write to disk';
				break;
			default:
				echo 'Unknown error.';
				break;
		}
		exit;	
	}
	//文件类型检查
	$filetype = $_FILES['idFile']['type'];
	if ($filetype != 'text/plain') {
		echo 'Problem: file is not plain text';
		exit;
	}
	//保存文件
	echo "文件处理中....<br/>";
	$upfile = 'd:/wamp/uploads/'.$_FILES['idFile']['name'];
	$tmpfile = $_FILES['idFile']['tmp_name'];
	echo $upfile."<br/>";
	echo $tmpfile."<br/>";
	if (is_uploaded_file($tmpfile)) {
		if(!move_uploaded_file($tmpfile, $upfile)) {
			echo 'Problem: Could not move file to destination directory.<br/>';
			exit;
		}
	} else {
		echo 'Problem: Possible file upload attack. Filename: '.$_FILES['idFile']['name'].'<br/>';
		exit;
	}
	echo '文件上传成功<br/>';
	//清除HTML and php tags.
	$contents = file_get_contents($upfile);
	$contents = strip_tags($contents);
	file_put_contents($_FILES['idFile']['name'], $contents);
	
	//展示上传内容
	echo '<p>Preview of uploaded file contents:<br/><hr/>';
	echo nl2br($contents);
	echo '<br/><hr/>';
?>