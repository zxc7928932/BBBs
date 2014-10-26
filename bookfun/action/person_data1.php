<?php 
	header("Content-Type:text/html;charset=utf-8");
	$filename = $_POST['filename'];
	$nickname = $_POST['nickname'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$signature = $_POST['signature'];
	//$curuser = $_SESSION['number'];
	$curuser = "2014210";
	$path="uploadfile/";
	
	if(!file_exists($path)) 
	{ 
		mkdir("$path", 0700); 
	}

	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); 

	if(!in_array($_FILES["filename"]["type"],$tp)) //判断图片类型是否正确
	{ 
		echo "<script> alert('图片格式不对！');window.location.href='center.php';</script>";
	}
	if($_FILES["filename"]["name"]) 
	{ 
		$file1=$_FILES["filename"]["name"]; 
		$file2 = $path.$file1; 
		$flag=1; 
	} 
//	if($flag) 
//	{
//		$result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2); //服务器端图片移动
//	}

	// This is the temporary file created by PHP
$uploadedfile = $_FILES['filename']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefromjpeg($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=100;
$newheight=200;
$tmp=imagecreatetruecolor($newwidth,$newheight);

// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 

// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filename = $file2;
imagejpeg($tmp,$filename,100);

imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.

	$link1 = mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
	mysql_select_db("test",$link1) or die("数据库访问错误".mysql_error());  	
	mysql_query("set names utf8");							
	$avatar = $file2;											
	
	//更新个人数据信息
	$cmd = "update register set Username ='".$nickname."',Age='".$age."',Sex='".$sex."',Photo='".$avatar."',singing='".$signature."' ";
	$cmd .= "where uid='".$curuser."'";
	$result = mysql_query($cmd);
	
	if(!result)
	{
		echo "<script> alert('修改个人信息失败');window.location.href='center.php';</script>";
	}
	else 
	{
		echo "<script> alert('修改个人信息成功');window.location.href='center.php';</script>";
	}
?>