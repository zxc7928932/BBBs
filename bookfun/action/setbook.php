<?php
	include("function.php");
	if($_POST["Submit"]!=""){
	$author=$_POST["author"];
	$press=$_POST["press"];
	$content=$_POST["content"];
	$filename = $_POST['filename'];
	$bookname=$_POST['bookname'];
	$path="uploadfile/";
	if(!file_exists($path)) 
	{ 
		mkdir("$path", 0700); 
	}
	/* 判断上传的文件类型是不是符合条件
	 * 不成功输出提示并跳转回注册界面
	 */ 
	$name=$_FILES["filename"]["name"];
	$end=strstr($name,'.');	
	$_FILES["filename"]["name"]=date('YmdHis', strtotime('now'))."$end";
	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); 
	if(!in_array($_FILES["filename"]["type"],$tp)) //判断图片类型是否正确
	{ 
		echo "格式不正确";
		"<script> alert('照片请上传正确格式!');window.location.href='register.php';</script>";
		
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
	
	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names gb2312");                                            //选择字符集标准格式
    $avatar = $file2;
	$row=mysql_query("select *from books where bookname='$bookname'");		//此用户名的数据
	$num=mysql_num_rows($row);													//此用户名数据行数
	if($num){		//如果已有，说明已有
		echo "<script language=javascript>alert('书已存在');history.back();</script>";
	}
	$sql=mysql_query("insert into books(bookname,author,press,content,image)values('$bookname','$author','$press','$content','$avatar')");
}
	if (!$sql){		//插入失败，跳转回注册页面
		//echo "<script> alert('系统繁忙，请重试!');window.location.href='.php';</script>";
	}
	else{			//注册成功，转到主页面
	mysql_close($link);			//关闭
	echo "<script> alert('注册成功!');window.location.href='home.php';</script>";
}
?>
